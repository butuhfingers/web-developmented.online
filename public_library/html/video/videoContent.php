<script src="/public_library/js/embedVideoPlayer.js"></script>
<script src="/public_library/js/embedVideoPlayerControls.js"></script>
<script>
	$(function (){
		newVideo("/videos/special features/5 Centimeters per Second (Music Video).mp4");

//		setInterval(function(){
//			newVideo("videos/movies/Princess Mononoke (English).mp4");
//		}, 5000);
	});

	//On a new video load
	function newVideo(videoSource){
		var videoElement = document.getElementById("main-video");
		var pageVideoPlayer = new videoPlayer(videoElement, videoSource);
		pageVideoPlayer.changeVideo(videoSource)

		videoElement.addEventListener( "loadedmetadata", function (e) {
			var width = this.videoWidth,
				height = this.videoHeight;

			var parent = $(videoElement).parent();
			$(parent).css('margin-left', ($(parent).parent().width() - $(videoElement).width()) / 2 + 'px');

			pageVideoPlayer.controls.playPause();
			pageVideoPlayer.controls.setVolume(0.5);
		}, false );

		$(window).resize(function(){
			var parent = $(videoElement).parent();
			$(parent).css('margin-left', ($(parent).parent().width() - $(videoElement).width()) / 2 + 'px');
		});
	};
</script>
<?php
if(!isMobile()){
	print('<link rel="stylesheet" href="/public_library/css/embedMainVideoDesktop.css" />');
}else{
	print('<link rel="stylesheet" href="/public_library/css/embedMainVideoMobile.css" />');
}

?>
<div id="main-video-content">
	<div id="video-container">
		<div id="main-video-title">
			Princess Mononoke (English) A longer title to a short story
		</div>

		<video id="main-video" preload="auto" data-setup="{}">
			<source src="" />
		</video>
	</div>

	<?PHP  require_once($_SERVER['DOCUMENT_ROOT'] . "/public_library/html/videoControls.php"); ?>
</div>
