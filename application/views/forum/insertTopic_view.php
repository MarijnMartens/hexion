<?php
/*
 * Author: Marijn
 * Created on: 10/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Aanmaken nieuw topic</h2>
<div class="content">
    <p></p>
    <?php
    if (!is_null($error)) echo "<span class='error'>$error</span><br/>";
    echo form_open('forum/insertTopicProcess');
    echo '<table class="form"><tr><td>';
    echo form_label('Topic-naam', 'title');
    echo '</td><td>';
    echo form_input($userdata['title']);
    echo '</td><td>';
    echo form_error('title');
    echo '</td></tr><tr><td>';
    echo form_label('Openingspost', 'reply');
    echo '</td><td>';
    echo form_textarea($userdata['reply']);
    echo '</td><td>';
    echo form_error('reply');
    //echo '</td></tr><tr><td colspan="3">';
    echo '</td></tr></table>';
    echo '<div class="right">';
    echo form_submit('submit', 'Maak topic aan', 'class="submit"');
    echo '</div>';
    echo form_close();
    ?>
</div>