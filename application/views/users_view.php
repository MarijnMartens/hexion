<?php

/*
 * Author: Marijn
 * Created on: 11/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

?>
<h2>Ledenlijst</h2>
<div class="content">
    <table class="forum">
        <?php
        //Iterate through alphabet
        foreach ($alphabet as $key => $letter) {
//Search letters that are not empty
            if ($letter != null) {
                echo '<a href="#' . $key . '" class="blackLink" style="width: 30px; text-align: center;"> ' . $key . ' </a>';
            }
        }

        //Iterate through alphabet
        foreach ($alphabet as $key => $letter) {
            //Search letters that are not empty
            if ($letter != null) {
                echo '<th>';
                echo '<div class="title" id="' . $key . '">' . $key . '</div>';
                echo '</th>';
                //print usernames for matching letter
                foreach ($letter as $userData) {
                    echo '<tr>';
                    echo '<td><a href="' . base_url() . 'profile/index/' . $userData->id . '" class="submit" style="width: 98%; margin: 0;">' . $userData->username . '</a></td>';
                    echo '</tr>';
                }
            }
        }
        ?>
    </table>
</div>