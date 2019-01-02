#!/bin/python

# A video spider will search for rogue videos inside the video folder
# Once a video is found, it will add it to the database of videos
# This can also be used to check if any changes to video have been made
# You can think of it like a Goggle Spider except with videos instead of links

import json
import subprocess
import shlex
import glob
import os
import MySQLdb
import uuid



class VideoSpider:
    # The video directory
    videoDirectory = "/var/www/html/developmented.online/videos/"
    # Database Variables
    host = "127.0.0.1"
    user = "developmented"
    password = "developmenteduser2018"
    database = "test.watch.developmented.com"

    # Getters
    @staticmethod
    def video_duration(video_meta_data):
        return video_meta_data['streams'][0]['duration']

    # Constructor
    def __init__(self):
        # print("I am a constructed video spider.");
        # output = self.video_meta_data(self.videoDirectory + 'bumps/Coffee.mp4')
        # print(json.dumps(output, indent=2))
        videos = self.find_new_videos("")
        self.add_videos_to_database(videos)

    # Return the meta data of a video
    def video_meta_data(self, video_path):
        # print(video_path)
        command = "ffprobe -v quiet -print_format json -show_streams"
        arguments = shlex.split(command)
        arguments.append(video_path)
        try:
            ffprobe_output = subprocess.check_output(arguments).decode('utf-8')
            ffprobe_output = json.loads(ffprobe_output)
        except subprocess.CalledProcessError as e:
            raise RuntimeError("command '{0}' return with error (code {1}): {2}".format(e.cmd, e.returncode, e.output))

        # Just in case we need to print out the
        # import pprint
        # pp = pprint.PrettyPrinter(indent=2)
        # pp.pprint(ffprobeOutput)

        # We need to return the data as a JSON
        return ffprobe_output

    def find_new_videos(self, directory):
        video_list = []
        full_path = self.videoDirectory + directory

        for file in os.listdir(full_path):
            if os.path.isfile(full_path + file):
                video_list.append("" + directory + file)
            elif os.path.isdir(full_path + file):
                video_list.extend(self.find_new_videos(directory + file + '/'))

        return video_list

    def add_videos_to_database(self, videos):
        # Connect to the database
        connection = MySQLdb.connect(self.host, self.user, self.password, self.database)

        with connection:
            cursor = connection.cursor()

        # SELECT all the videos in the database to check for duplicates
        query = "SELECT VideoPath from VideoPaths WHERE 1"
        cursor.execute(query)
        temp_paths = cursor.fetchall() # Create a temporary tuple to store the data
        video_paths = []    # The actual tuple the data will be stored into

        for x in range(len(temp_paths)):
            video_paths.append(temp_paths[x][0])

        # Add the videos to the database
        for video in videos:
            if video in video_paths:
                print("SKIPPED: " + video)
                continue
            video_name = video[(len(video) - video[::-1].find("/")):-(video[::-1].find(".") + 1)]
            video_data = self.video_meta_data(self.videoDirectory + video)
            query = "INSERT INTO VideoPaths (VideoPathName, VideoPath, VideoPathDuration) VALUES (%s, %s, %s)"
            cursor.execute(query, (video_name, video, str(self.video_duration(video_data))))
            print("ADDED: " + video_name + " : " + video)

        connection.close()

videoSpider = VideoSpider()
