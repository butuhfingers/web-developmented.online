<?php
if(!isMobile()){
    print('<link rel="stylesheet" href="/public_library/css/videoControls.css" type="text/css" />');
}else{
    print('<link rel="stylesheet" href="/public_library/css/videoControlsMobile.css" type="text/css" />');
}

?>

<div class="video-controls">
    <div class="video-overall-time-bar">
        <div class="video-current-time-bar"></div>
    </div>

    <div class="play-pause-button video-control-button-html left">
        <div class="play-button">
            <img src="/public_library/images/pauseButton.png" />
        </div>
    </div>

    <div class="mute-button video-control-button-html left">
        <img src="/public_library/images/muteButton.png" />
    </div>

    <div class="mobile-element-cluster">
        <div class="volume-slider left">
            <input class="slider" type="range" min="0.0" max="1.0" value="0.5" step="0.05" />
        </div>

        <div class="video-time left"></div>
    </div>

    <div class="video-viewer-count right">
        <img class="video-control-info-html" src="https://d30y9cdsu7xlg0.cloudfront.net/png/38226-200.png" />

        <div class="video-viewer-counter video-control-info-html left">
			<p>0</p>
        </div>
    </div>
    <!--<div class="full-screen-button video-control-button right">
        <img class="video-control-button-html" src="http://freevector.co/wp-content/uploads/2014/02/1481-full-screen-button1.png" />
    </div>-->
</div>