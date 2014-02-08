<?php
/*
 * Author: Marijn
 * Created on: 20/12/2013
 * Edit on: 16/04/2014: Captcha added
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Vul in wat je nog weet</h2>
<div class="content">
    <?php
    echo '<table class="form"><tr><td>';
    if (!is_null($error)) echo "<span class='error'>$error</span><br/>";
    echo validation_errors();
    echo form_open('login/password_reset');
    echo '</td></tr><tr><td>';
    echo form_label('Gebruikersnaam', 'username');
    echo '</td><td>';
    echo form_input($userdata['username']);
    echo '</td><td>';
    echo form_error('username');
    echo '</td></tr><tr><td>';
    echo form_label('Email', 'email');
    echo '</td><td>';
    echo form_input($userdata['email']);
    echo '</td><td>';
    echo form_error('email');
    echo '</td></tr><tr><td>';
    echo $captcha;
    //echo '</td></tr><tr><td colspan="3">';
    echo '</td></tr></table>';
    echo '<div class="right">';
    echo form_submit('submit', 'Stuur een nieuw wachtwoord!', "class='submit'");
    echo '</div>';
    echo form_close();
    ?>
</div>