<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dermatix Scar Game</title>

    <!-- Bootstrap core CSS -->
	
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/global.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/facebox.css" rel="stylesheet">
    <link href="assets/fonts/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link media="all" type="text/css" rel="stylesheet" href="http://localhost:8888/themes/frontend/assets/stylesheets/style.css">
    <link media="all" type="text/css" rel="stylesheet" href="http://localhost:8888/themes/frontend/assets/stylesheets/custom.css">
    <link media="all" type="text/css" rel="stylesheet" href="http://localhost:8888/themes/frontend/assets/stylesheets/responsive.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<div id="fb-root"></div>
   <?php
   session_start();
   if (!isset($_SESSION["uid"])){
	   $_SESSION["uid"]=uniqid()."-".time();
   }
   
   ?>
  </head>

  <body>

  <div id="loader-wrapper">
	<div id="loader"></div>

	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>

  </div>
