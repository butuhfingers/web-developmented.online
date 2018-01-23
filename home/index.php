<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public_library/css/generalbody.css"/>
    <link rel="stylesheet" type="text/css" href="/public_library/css/home.css"/>
	    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <title>The home of CN TV!</title>
</head>
<body>
<?PHP include_once($_SERVER['DOCUMENT_ROOT'] . "/public_library/html/menu.php"); ?>

<div id="home-main-body-content">
    <div id="home-of-awesome-text">The home of something awesome!</div>
    <div id="login-form">
        <form method="POST" action="/index.php">
            <input class="username-input" placeholder="Email or Username">
            <input class="password-input" type="password" placeholder="Password" />
            <br><button id="login-buttons">Login</button>
        </form>
    </div>
</div>
</body>
</html>