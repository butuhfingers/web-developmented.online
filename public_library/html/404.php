
<!DOCTYPE html>
<html>
<head>
    <title>File Not Found</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body {
            background-color: #eee;
        }

        body, h1, p {
            font-family: "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;
            font-weight: normal;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            margin-left:  auto;
            margin-right:  auto;
            margin-top: 25px;
            max-width: 1170px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .row:before, .row:after {
            display: table;
            content: " ";
        }

        .col-md-6 {
            width: 50%;
        }

        .col-md-push-3 {
            margin-left: 25%;
        }

        h1 {
            font-size: 48px;
            font-weight: 300;
            margin: 0 0 20px 0;
        }

        .lead {
            font-size: 21px;
            font-weight: 200;
            margin-bottom: 20px;
        }

        p {
            margin: 0 0 10px;
        }

        a {
            color: #3282e6;
            font-weight:bold;
            text-decoration: underline;
        }
        #404-image{
            float:Left;
            display:none;
            width:400px;
        }
            #404-image img{
                float:left;
                width:100%;
            }
    </style>
</head>

<body>
<div class="container text-center" id="error">
    <svg height="100" width="100">
        <polygon points="50,25 17,80 82,80" stroke-linejoin="round" style="fill:none;stroke:#ff8a00;stroke-width:8" />
        <text x="42" y="74" fill="#ff8a00" font-family="sans-serif" font-weight="900" font-size="42px">!</text>
    </svg>
    <div class="row">
        <div class="col-md-12">
            <div class="main-icon text-warning"><span class="uxicon uxicon-alert"></span></div>
            <h1>File not found (404 error)</h1>
        </div>
    </div>

    <div class="row">
        <div id="404-image">
            <img width="600" src="/public_library/images/fileNotFound.jpg" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <p class="lead">Sorry about that! Please <a href="/">REDIRECT</a> yourself to safety!</p>
        </div>
    </div>
</div>

</body>
</html>
