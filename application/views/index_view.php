<!-- 
Author: Marijn
Created on: 20/12/2013
Last modified on: 26/12/2013
Edit: 04/01/2014: Twitter Timeline implentation
References: Official Twitter developer manual
-->
<?php
foreach ($result as $row) {
    echo '<div class="island" id="' . $row->id . '">';
    echo '<h2 class="toggle">' . $row->title . '</h2>';
    echo '<article>';
    echo '<p>' . $row->username . ' ' . $row->date . '</p>';
    echo '<p>' . $row->message . '</p>';
    echo '</article>';
    echo '</div>';
}
?>