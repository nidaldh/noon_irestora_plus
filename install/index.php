﻿<?php 
header('Content-type: text/html; charset=ISO-8859-1');
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
//getting base url for actual path
$root=(isset($_SERVER["HTTPS"]) ? "https://" : "http://").$_SERVER["HTTP_HOST"];
$root.= str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);
$base_url = $root;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!-- //need to change -->
    <title>iRestora PLUS</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url?>css/bootstrap.min.css"/>
    <link href="<?php echo $base_url?>css/custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $base_url?>css/inline.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $base_url?>css/edit.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $base_url?>css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!-- //need to change -->
    <link rel="shortcut icon" href="<?php echo  $base_url?>img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="main_header">
        <div id="install-header">
            <!-- //need to change -->
            <img class="ins_1" src="<?php echo  $base_url?>img/main_logo.png"/>
        </div>
        <div class="install">
            <?php
            require("install.php");
            ?>
        </div>
    </div>
</body>
</html>