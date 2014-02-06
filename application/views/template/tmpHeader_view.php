<?php
/*
 * Author: Marijn
 * Created on: 20/12/2013
 * Last modified on: 16/01/2014
 * Edit: 04/01/2014: Session implementation; hide/show user controls
 * Edit: 16/01/2014: divided code over tmpHeader_view and tmpPage_view
 * References: none
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="nl"> <!-- Important for the Twitter Timeline -->
<head>
    <meta charset="UTF-8">
    <!-- Get page-title -->
    <title><?PHP echo $title; ?></title>
    <!-- Get icon -->
    <?PHP echo link_tag('assets/images/logo.ico', 'shortcut icon', 'image/ico'); ?>
    <!-- Get css -->
    <?PHP
    echo link_tag("assets/css/layout.css");
    echo link_tag("assets/css/text.css");
    //Webkit fixes
    echo '<link rel="stylesheet" href="assets/css/webkit.css" type="text/chrome/safari';
    ?>
    <!-- Download jquery if not on computer -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Css popup script -->
    <script>
        window.document.onkeydown = function (e) {
            if (!e) {
                e = event;
            }
            if (e.keyCode == 27) {
                lightbox_close();
            }
        }
        function lightbox_open() {
            window.scrollTo(0, 0);
            document.getElementById('light').style.display = 'block';
            document.getElementById('fade').style.display = 'block';
        }
        function lightbox_close() {
            document.getElementById('light').style.display = 'none';
            document.getElementById('fade').style.display = 'none';
        }
    </script>

</head>
<body>
<!-- Start container -->
<div id="container">
    <!-- Start Header containing menu's / logo -->
    <header>
        <!-- Get logo -->
        <div id="logo">
            <a href="<?php echo base_url('welcome'); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"
                                                              alt="logo" height="100"/></a>
        </div>

        <!-- Start user-menu -->
        <div class='user_menu'>
            <!-- Start List Links User_menu -->
            <ul>
                <!-- Dispay either login links or display username -->
                <?php if ($this->session->userdata('validated') == TRUE) { ?>
                    <!-- User logged in, display username -->
                    <li><a href="#"
                           onclick="lightbox_open();">Hallo <?php echo $this->session->userdata('username'); ?></a></li>
                <?php } else { ?>
                    <!-- User NOT logged in, display login/register buttons -->
                    <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
                    <li><a href="<?php echo base_url('login/register'); ?>">Registreer</a></li>
                <?php } ?>
                <!-- End List Links User_menu -->
            </ul>
        </div>
        <div class="clear"></div>
        <!-- End user-menu -->

        <!-- Start Display css-popup containing userProfile actions -->
        <div id="light">
            <a href="<?php echo base_url('profile'); ?>">Profiel</a>
            <br>
            <a href="<?php echo base_url('profile/all'); ?>">Ledenlijst</a>
            <br>
            <a href="<?php echo base_url('login/logout'); ?>">Logout</a>
        </div>
        <!-- End Display css-popup userProfile action -->
        <!-- Fade rest webpage -->
        <div id="fade" onClick="lightbox_close();"></div>
        <!-- End Fade -->

        <!-- Start Main-menu -->
        <nav>
            <!-- Start List Links Main-menu -->
            <ul>
                <li><a href="<?php echo base_url('welcome'); ?>">Startpagina</a></li>
                <li><a href="<?php echo base_url('forum'); ?>">Forum</a></li>
                <li><a href="<?php echo base_url('event'); ?>">Evenementen</a></li>
                <li><a href="<?php echo base_url('welcome/info'); ?>">Info</a></li>
                <li><a href="<?php echo base_url('welcome/contact'); ?>">Contact</a></li>
                <li><a href="<?php echo base_url('welcome/multimedia'); ?>">Multimedia</a></li>
                <!-- End List Links Main-menu -->
            </ul>
            <!-- Start Search form -->
            <form action="<?php echo base_url('search'); ?>" method="post">
                <input type="text" id="search" name="search" placeholder="Zoeken" size="25"/>
                <input type="submit" id="searchSubmit" value="&#128269" name="submit"/>
                <!-- End Search form -->
            </form>
            <!-- End Main-menu -->
        </nav>
        <div class="clear"></div>

        <!-- End Header -->
    </header>