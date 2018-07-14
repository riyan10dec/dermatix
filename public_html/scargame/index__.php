<?php
$pathdir = "./";
$strcss = "";
$strjs = "";
$bodyid = "bodyhome";
$pagename="home";
$baseDir = getcwd().'/';

require_once("db/db_eakoplak.php");
require_once("header_dermatix.php");
?>
  
  <div id="content">
  	<header class="header header-two">
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-2 col-lg-3 logo-box">
                    <div class="logo">
                        <a href="http://dermatix.co.id">
                            <img alt="" class="logo-img" src="http://dermatix.co.id/themes/frontend/assets/images/logo.png">
                        </a>
                    </div>
                </div><!-- .logo-box -->
                <div class="col-xs-6 col-md-10 col-lg-9 right-box">
                    <div class="right-box-wrapper">
                        <div class="header-icons">
                            <div class="search-header hidden-600">
                                <a href="#">
                                    <svg xml:space="preserve" enable-background="new 0 0 16 16" viewBox="0 0 16 16" height="16px" width="16px" y="0" x="0">
                                        <path d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
                                        s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
                                        s4,1.794,4,4S8.206,10,6,10z"/>
                                        <image style="vertical-align: top;" height="16" width="16" alt="" src="img/png-icons/search-icon.png">
				                    </image></svg>
                                </a>
                            </div><!-- .search-header -->
                        </div><!-- .header-icons -->

                        <div class="primary">
                            <div role="navigation" class="navbar navbar-default">
                                <button data-target=".primary .navbar-collapse" data-toggle="collapse" class="navbar-toggle btn-navbar collapsed" type="button">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <nav class="collapse collapsing navbar-collapse">
                                    <ul class="nav navbar-nav navbar-center" id="nav">
                                        <li>
                                            <a href="http://dermatix.co.id">Home</a>
                                        </li>
                                   