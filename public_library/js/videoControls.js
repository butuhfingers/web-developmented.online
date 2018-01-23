//The video object
function VideoControls(){
    //The predefined variables
    var isLiveVideo = true;
    var video = $("video")[0];
    var timeBar = $(".video-current-time")[0];
    var videoTimer = $(".video-time")[0];

    //Return the supposed live video time
    this.LiveVideoTime = function(){
        return getLiveVideoTime();
    }
    var getLiveVideoTime = function(){
        //Get the seconds since the epoch
        var secondSinceEpoch = Math.floor(new Date() / 1000);
        //Modulus the video duration
        return modulus(secondSinceEpoch, video.duration);
    }

    //Play or pause the video
    this.PlayPauseVideo = function(){
        playPauseVideo();
    }
    playPauseVideo = function(){
        //Check if the video is playing or not
        if(video.paused){
            //Check if our video is considerred live
            if(isLiveVideo){
                video.currentTime = getLiveVideoTime();
            }

            video.play();
            // alert("Play video");
        }else{
            video.pause();
            // alert("Play video");
        }

        changePlayButton(video.paused);
    }

    changePlayButton = function(isPaused){
        var playButton = $(".play-button")[0];
        var pauseButton = $(".pause-button")[0];

        if(isPaused) {
            playButton.style.display = "block";
            pauseButton.style.display = "none";
        }else{
            playButton.style.display = "none";
            pauseButton.style.display = "block";
        }
    }

    //Adjust the video volume
    adjustVideoVolume = function(newVolume){
        if(newVolume != video.volume){
            video.volume = newVolume;
        }
    }


    //Check if we need to mute video or not
    muteUnmuteVideo = function(){
        if(video.muted){
            video.muted = false;
        }else{
            video.muted = true;
        }
    }

    //Make the video fullscreen
    fullscreenVideo = function(){

    }

    //Adjust the video current time
    adjustCurrentTime = function(){
        var currentTime = Math.round(video.currentTime);
        var duration = Math.round(video.duration);

        currentTimePercentage = (currentTime / duration) * 100;

        timeBar.style.width = currentTimePercentage.toString() + "%";

        //Create a new video time object
        var currentTimeObject = new VideoTime(currentTime);
        var durationTimeObject = new VideoTime(duration);

        videoTimer.innerHTML = currentTimeObject.toString() + " | " + durationTimeObject.toString();
    }

    //Setup the event listeners
    setupListeners = function(){
        // alert("Setup listeners");
        //Play / pause
        $(".play-pause-button").click(playPauseVideo);
        //Mute or unmute
        $(".mute-button").click(function(){
            muteUnmuteVideo()
        });
        //Intervals for the video that we must double check
        window.setInterval(function(){
            //Adjust the video volume
            adjustVideoVolume($(".volume-slider").find("input[type=range]").val());
            //Update video time
            adjustCurrentTime();
        }, 200);
        //Full screen or non full screen
        // $(".full-screen-button").click(fullScreen);
    }

    //Setup or listeners
    setupListeners();
}