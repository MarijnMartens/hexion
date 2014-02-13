<?php

/*
 * Author: Marijn
 * Created on: 10/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

echo '<h2>Verwijder Topic: ' . $topic_title
    .
    '</h2>';
echo '<div class="content">';
echo form_open('forum/deleteTopicProcess'); ?>
    <p>Ben je ABSOLUUT zeker dat je <b><?php echo $topic_title; ?></b> wil verwijderen, deze actie is onomkeerbaar.
    </p>
    <div class="right">
        <?php echo form_submit('submit', 'Ja, gooi het topic weg', 'class="submit"'); ?>
    </div>
<?php echo form_close();
echo '</div>';