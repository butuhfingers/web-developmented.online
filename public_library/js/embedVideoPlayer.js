/**
 * Created by Recreational on 2/28/2018.
 */
//Create the video page video variable
videoPlayer = function(videoElement, videoSource){
    var video = videoElement;
    var controls = new videoControls(videoElement);
    var sourceElement = $(video).find("source")[0];
    var sourceName = videoSource;

    function changeVideo(newSource){
        video.src = newSource;
    };

    return {
        source : sourceName,
        controls : controls,
        changeVideo : changeVideo
    }
};