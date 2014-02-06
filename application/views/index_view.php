<!-- 
Author: Marijn
Created on: 20/12/2013
Last modified on: 26/12/2013
Edit: 04/01/2014: Twitter Timeline implentation
References: Official Twitter developer manual
-->
<?php
//Special page because there are more than one articles
//In template the opening and closing tags are defined to allow easier creating of files
for ($i = 0; $i < count($result); $i++) {
    if ($i == count($result) - 1) {
        echo '<div class="island" id="' . $result[$i]->id . '">';
        //echo '<h2 class="toggle">' . $row->title . '</h2>';
        echo '<h2' . $result[$i]->title . '</h2>';
        echo '<div>';
        echo '<p>' . $result[$i]->username . ' ' . $result[$i]->date . '</p>';
        echo '<p>' . $result[$i]->message . '</p>';
        echo '</div>';
    } else {
        echo '<div class="island" id="' . $result[$i]->id . '">';
        //echo '<h2 class="toggle">' . $row->title . '</h2>';
        echo '<h2' . $result[$i]->title . '</h2>';
        echo '<div>';
        echo '<p>' . $result[$i]->username . ' ' . $result[$i]->date . '</p>';
        echo '<p>' . $result[$i]->message . '</p>';
        echo '</div>';
        echo '</article>';
        echo '<article>';
    }


}
?>