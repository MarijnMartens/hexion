<?php
/*
 * Author: Marijn
 * Created on: 11/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Contact Formulier</h2>
<div class="content"><p>
        <?php
        if (!is_null($error)) echo "<span class='error'>$error</span><br/>";
        echo form_open('welcome/contactProcess');
        echo '<table class="form"><tr><td>';
        echo form_label('Naam', 'name');
        echo '</td><td>';
        echo form_input($data['name']);
        echo '</td><td>';
        echo form_error('name');
        echo '</td></tr><tr><td>';
        echo form_label('Email', 'email');
        echo '</td><td>';
        echo form_input($data['email']);
        echo '</td><td>';
        echo form_error('email');
        echo '</td></tr><tr><td>';
        echo form_label('Onderwerp', 'subject');
        echo '</td><td>';
        echo form_input($data['subject']);
        echo '</td><td>';
        echo form_error('subject');
        echo '</td></tr><tr><td>';
        echo form_label('Bericht', 'message');
        echo '</td><td>';
        echo form_textarea($data['message']);
        echo '</td><td>';
        echo form_error('message');
        echo '</td></tr><tr><td colspan="3">';
        echo $captcha;
        echo '</td></tr><tr class="right"><td colspan="3">';
        echo form_submit('submit', 'Stuur bericht naar Admin', "class='submit'");
        echo '</td></tr></table>';
        echo form_close();
        ?>
    </p></div>