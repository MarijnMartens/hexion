<?php
/*
 * Author: Marijn
 * Created on: 20/12/2013
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Aanmelden</h2>
<div class="content"><p>
        <?php if (!is_null($error)) echo "<span class='error'>$error</span><br/>"; ?>
        <?php
        echo form_open('login/login_process');
        echo '<table class="form"><tr><td>';
        echo form_label('Gebruikersnaam', 'username');
        echo '</td><td>';
        echo form_input($userdata['username']);
        echo '</td></tr><tr><td>';
        echo form_label('Wachtwoord', 'password');
        echo '</td><td>';
        echo form_password($userdata['password']);
        echo '</td></tr><tr><td colspan="2">';
        echo form_submit('submit', 'Log mij nu in!', 'class="submit"');
        echo '<a href="' . base_url() . '>login/password_reset" class="blackLink" >Paswoord vergeten?</a>';
        echo '</td></tr></table>';
        echo form_close();
        ?>
    </p></div>