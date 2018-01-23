/**
 * Created by Recreational on 12/13/2016.
 */

$( document ).ready(function() {
    console.log( "document loaded" );
    //Get seconds since epoch
    var seconds = Math.floor(new Date() / 1000);


    var video = document.getElementById("cartoon-video");
    video.pause();

    var interval = setInterval(function() {
        if (video.readyState === 4) {
            video.currentTime = Math.floor(seconds % video.duration);
            clearInterval(interval);
        }
    }, 500);

    video.play();

    var checkVideoTime = setInterval(function() {
        if (video.currentTime >= video.duration - 0.5) {
            currentTime = 0;
            clearInterval(checkVideoTime);
        }
    }, 500);
});