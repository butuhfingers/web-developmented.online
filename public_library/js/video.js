/**
 * Created by Recreational on 12/13/2016.
 */
//Events
$( document ).ready(function() {
    var video = new Video($("video")[0]);

    //Check if video is loaded
    var sendVideoDataInterval = setInterval(function(){
        if(video.IsVideoLoaded()){
            //This is inside of videoDataCheck script
            SendVideoData();
            clearInterval(sendVideoDataInterval);
        }
    }, 500);
});

function Video(video) {
    //Variables
    var controls = new VideoControls();
    this.IsVideoLoaded = function(){
        return isVideoLoaded();
    }
    isVideoLoaded = function(){
        return video.readyState === 4;
    }

    //Setup our _constructor function
    _constructor = function() {
        EnabledVideoReadyListener();
        EnableVideoCompletionListener();
    };

    EnabledVideoReadyListener = function(){
        //Check every .5 seconds if the video is ready
        var interval = setInterval(function () {
            //Check if the video is loaded
            if(!isVideoLoaded())
                return;

            controls.PlayPauseVideo();
            clearInterval(interval);
        }, 500);
    }

    //Check if the video has been complete
    EnableVideoCompletionListener = function(){
        //Check every second if the video has been completed
        //Is our video complete?
        video.addEventListener('ended', function() {
            var newInterval = setInterval(function(){
                controls.PlayPauseVideo();
                clearInterval(newInterval);
            }, 250);
        }, false);
    }

    _constructor();
}