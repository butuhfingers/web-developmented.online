<?PHP
require_once ("../script_library/userInfo/userValidation.php");

//Check the user validation
$valid = new User\userValidation();
//echo $valid->isUserAllowed() ? "True" : "False";
//Check if the user is anonymous
/*if(!$valid->isUserAllowed()){
    header("Location: ../../");
    exit();
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/public_library/images/Cartoon_Network_2004_logo.png" />
    <link rel="stylesheet" type="text/css" href="/public_library/css/generalbody.css"/>
    <link rel="stylesheet" type="text/css" href="/public_library/css/home.css"/>
    <link rel="stylesheet" type="text/css" href="/public_library/css/video.css"/>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <?PHP require_once("../public_library/html/liveVideoJSInclude.php");?>
    <title>Watch your favorite cartoons!</title>
</head>
<body>

<?PHP include_once($_SERVER['DOCUMENT_ROOT'] . "/public_library/html/menu.php"); ?>

<div id="video-main-body-content">
    <?PHP require_once ($_SERVER['DOCUMENT_ROOT'] . "/public_library/html/videoLive.php");?>
	
	<?PHP require_once ($_SERVER['DOCUMENT_ROOT'] .  "/schedule/schedule.php"); //SCHEDULE ?>

</div>
</body>
</html>