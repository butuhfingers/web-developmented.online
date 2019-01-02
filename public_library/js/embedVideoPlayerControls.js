/**
 * Created by Recreational on 2/28/2018.
 */
videoControls = function(videoElement){
    //The statistics of the controls
    var isPlaying = false,
        isMuted = false,
        isFullscreen = false,
        volume = 0,
        currentVideoTime = 0,
        videoDuration = 0;

    //The buttons the user can click on
    var videoScreen = $("#main-video"),
        playButton = $(".play-button"),
        muteButton = $(".mute-button"),
        volumeSlider = $(".volume-slider"),
        volumeSliderInterval = {},
        videoTimeSection = $(".video-time"),
        fullScreenButton = $(".full-screen-button"),
        currentTimeBar = $(".video-current-time-bar");

    //Sources
    var playButtonImage = "/public_library/images/playButton.png",
        pauseButtonImage = "/public_library/images/pauseButton.png",
        muteButtonImage = "/public_library/images/muteButton.png",
        unmuteButtonImage = "/public_library/images/unmuteButton.png";

    //Setup our listeners
    playButton.click(playPauseVideo);
    videoScreen.click(playPauseVideo);
    muteButton.click(function(){
        isMuted = !isMuted;
        setVolume(volume);

        //Change the button image
        if(isMuted){
            $(muteButton).find("img")[0].src = unmuteButtonImage;
        }else{
            $(muteButton).find("img")[0].src = muteButtonImage;
        }
    });
    //When we click the slider
    volumeSlider.mousedown(function(){
        volumeSliderInterval = setInterval(function(){
            setVolume($(".volume-slider").find("input[type=range]").val());
        }, 20)
    });
    volumeSlider.on('touchstart', function(){
        volumeSliderInterval = setInterval(function(){
            setVolume($(".volume-slider").find("input[type=range]").val());
        }, 20)
    });
    //When we lift up on the slider
    volumeSlider.mouseup(function(){
        clearInterval(volumeSliderInterval);
    });
    volumeSlider.on('touchend', function(){
        clearInterval(volumeSliderInterval);
    });

    //Change our time bar as the video continues
    setInterval(function(){
        setCurrentTimeBar(getCurrentVideoTime() / getVideoDuration());
        setCurrentTimeSection(getCurrentVideoTime(), getVideoDuration());
    },50);

    //Play or pause the video, depending on the state it is in
    function playPauseVideo(){
        //Check if we are paused
        if(!isPlaying){
            videoElement.play();
            $(playButton).find("img")[0].src = pauseButtonImage;
        }else{
            videoElement.pause();
            $(playButton).find("img")[0].src = playButtonImage;
        }

        isPlaying = !isPlaying;
    };

    //We need to set the volume of the video
    function setVolume(newVolume){
        var currentVolume = videoElement.volume;

        //Set the actual volume we want
        videoElement.volume = newVolume;
        volume = newVolume;

        //Check if we are supposed to be muted
        if(isMuted){
            //We are muted, make us 0
            videoElement.volume = 0;
            return;
        }
    }

    function fullScreenVideo(){

    };

    function getVideoDuration(){
        //Get the duration from the video and set it
        return videoElement.duration;
    }

    function getCurrentVideoTime(){
        //Get the current video time and set it
        return videoElement.currentTime;
    }

    function setCurrentVideoTime(newTime){
        //Check if the value is between 0 and the duration
        if(newTime > 0 && newTime < getVideoDuration()){
            videoElement.currentTime = newTime;
        }
    }

    //Set current video time bar
    function setCurrentTimeBar(percentageComplete){
        $(currentTimeBar).css("width", (percentageComplete * 100) + "%");
    }

    //Set current video time section
    function setCurrentTimeSection(elapsedTime, duration){
        $(videoTimeSection).text("" + elapsedTime.toFixed(2) + " / " + duration.toFixed(2));
    }

    //Return our video controls object
    return{
        isPlaying : isPlaying,
        isMuted : isMuted,
        isFullscreen : isFullscreen,
        volume : volume,
        playPause : playPauseVideo,
        fullScreen : fullScreenVideo,
        setVolume : setVolume
    }
};