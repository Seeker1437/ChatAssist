<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="og:description" content="A platform aimed at providing reliable and highly available chat bot experience for many area using the new Amazon Lex service.">
    <meta name="og:title" content="ChatAssist">
    <meta name="og:type" content="object">
    <meta name="og:image" content="<?php echo Config::get("URL");?>public/images/logo.png">
    <meta name="og:url" content="<?php echo Config::get("URL");?>">
    <title>ChatAssist</title>
    <?php if ($this->checkForActiveControllerAndAction($filename, "cybersecurity/index")) { ?>
        <style language="text/css">
            input#wisdom {
                padding: 4px;
                font-size: 1em;
                width: 400px
            }

            input::placeholder {
                color: #ccc;
                font-style: italic;
            }

            p.userRequest {
                margin: 4px;
                padding: 4px 10px 4px 10px;
                border-radius: 4px;
                min-width: 50%;
                max-width: 85%;
                float: left;
                background-color:#65bbf7;
            }

            p.lexResponse {
                margin: 4px;
                padding: 4px 10px 4px 10px;
                border-radius: 4px;
                text-align: right;
                min-width: 50%;
                max-width: 85%;
                float: right;
                background-color: #142933;
                font-style: italic;
                color:white;
            }

            p.lexError {
                margin: 4px;
                padding: 4px 10px 4px 10px;
                border-radius: 4px;
                text-align: right;
                min-width: 50%;
                max-width: 85%;
                float: right;
                background-color: #f77;
            }
        </style>
    <?php } ?>
    <link href="<?php echo Config::get('URL'); ?>public/css/styles.css" rel="stylesheet">
    <link href="<?php echo Config::get('URL'); ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('URL'); ?>public/fonts/font-awesome.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo Config::get('URL'); ?>public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div id="ms-preload" class="ms-preload">
    <div id="status">
        <div class="preloader-img-div">
            <img class="preloader-image" src="<?php echo Config::get("URL"); ?>public/images/logo.png" alt="ChatAssist Logo">
        </div>
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
