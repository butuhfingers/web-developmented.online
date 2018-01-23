<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/script_library/video/videoGenerator.php");
	$generator = new \video\videoGenerator();
?>
<div id="cartoon-video-container">
    <div id="cartoon-video-section">
        <div id="cartoon-video-title">
            <?php
				$generatedVideo = $generator->CurrentVideoToShow();
				$title = substr($generatedVideo, strrpos($generatedVideo, "/") + 1);
				$title = explode(".mp4", $title)[0];
				print('<p>' .  $title . '</p>');
			?>
        </div>

        <video id="cartoon-video" preload="auto" data-setup="{}">
			<?php
				print('<source src="../' . $generatedVideo . '" type="video/mp4">');
			?>
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>
        <?PHP  require_once($_SERVER['DOCUMENT_ROOT'] . "/public_library/html/videoControls.php"); ?>
    </div>
</div>

<!--<div id="video-debugger" style="position:absolute; bottom:0; background:black; width:90%; padding:10px 5%; color:red; font-size:20px;">

</div>-->