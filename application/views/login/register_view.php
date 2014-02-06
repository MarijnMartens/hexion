<?php
/*
 * Author: Marijn
 * Created on: 20/12/2013
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Registeren</h2>
<div class="content">
    <p>
        <?php if (!is_null($error)) echo "<span class='error'>$error</span><br/>";
        echo form_open('login/register');
        echo '<table class="form"><tr><td>';
        echo form_label('Gebruikersnaam', 'username');
        echo '</td><td>';
        echo form_input($userdata['username']);
        echo '</td><td>';
        echo form_error('username');
        echo '</td></tr><tr><td>';
        echo form_label('Wachtwoord', 'password');
        echo '</td><td>';
        echo form_password($userdata['password']);
        echo '</td><td>';
        echo form_error('password');
        echo '</td></tr><tr><td>';
        echo form_label('Herhaal wachtwoord', 'passwordConf');
        echo '</td><td>';
        echo form_password($userdata['passwordConf']);
        echo '</td><td>';
        echo form_error('passwordConf');
        echo '</td></tr><tr><td>';
        echo form_label('Email', 'email');
        echo '</td><td>';
        echo form_input($userdata['email']);
        echo '</td><td>';
        echo form_error('email');
        echo '</td></tr><tr><td colspan="3">';
        echo form_submit('submit', 'Registreer nu!', "class='submit'");
        echo '</td></tr></table>';
        echo form_close();
        ?>
    </p>
</div>

