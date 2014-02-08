<?php
/*
 * Author: Marijn
 * Created on: 08/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Voeg antwoord toe</h2>
<div class="content"><p></p>
    <?php
    if (!is_null($error)) echo "<span class='error'>$error</span><br/>";
    echo validation_errors();
    echo form_open('forum/insertReplyProcess');
    echo '<table class="form"><tr><td>';
    echo form_label('Antwoord', 'reply');
    echo '</td><td>';
    echo form_textarea($userdata['reply']);
    echo '</td></tr><tr><td>';
    echo $captcha;
    echo '</td></tr></table>';
    //echo '</td></tr><tr><td colspan="2">';
    echo '<div class="right">';
    echo form_submit('submit', 'Maak antwoord aan', 'class="submit"');
    echo '</div>';
    echo form_close();
    ?>
</div>