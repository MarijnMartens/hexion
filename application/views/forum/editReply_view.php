<?php

/*
 * Author: Marijn
 * Created on: 09/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Pas antwoord aan</h2>
<div class="content">
    <?php
    if (!is_null($error)) {
        echo "<span class='error'>$error</span><br/>";
    }
    echo validation_errors();
    echo form_open('forum/editReplyProcess');
    echo '<table class="form"><tr><td>';
    echo form_label('Antwoord', 'reply');
    echo '</td><td>';
    echo form_textarea($userdata['reply']);
    //echo '</td></tr><tr><td colspan="2">';
    echo '</td></tr></table>';
    echo '<div class="right">';
    echo form_submit('submit', 'Wijzig antwoord', 'class="submit"');
    echo '</div>';
    echo form_close();
    ?>
</div>