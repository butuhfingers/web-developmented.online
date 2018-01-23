/**
 * Created by Recreational on 7/3/2017.
 */
//Check if the web page has been loaded
$( document ).ready(function() {
    var videoStyle = new VideoStyle(document.getElementById("cartoon-video-section"));
});
//Check if the window has resized
$(window).resize(function() {
    var videoStyle = new VideoStyle(document.getElementById("cartoon-video-section"));
});

function VideoStyle(videoContainer){
    //Get the margin needed for the video
    var video = document.getElementById("cartoon-video");
//	var videoContainer = document.getElementById("cartoon-video-container");
    var videoWidth = video.offsetWidth;
    var windowWidth = window.innerWidth;

    videoContainer.style.marginLeft = (windowWidth - videoWidth) / 2 + "px";
//	video.style.marginLeft = (videoContainer.offsetWidth - videoWidth) / 2 + "px";
//	video.style.marginLeft = "100px";
}