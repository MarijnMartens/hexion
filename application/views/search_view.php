<?php

/*
 * Author: Marijn
 * Created on: 11/01/2014
 */

//A very ill-looking view but all the functionality is purely for display purposes
//Switches are mainly to prevent display of certain column-items, translate table column metadata and sorts
//Doing this in the controller would only make my controller less readable. Not much improve the MVC-model in any way.

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

echo '<h2>' . $title . '</h2>';
echo '<div class="content">';

//iterate each database table in getAll
for ($i = 0; $i < count($result); $i++) {
    $table = $result[$i];
//foreach ($result as $table) { // Code OUT OF USE, replaced by for-lus to get counter for rows
    //check database table has result
    if ($table) {
        //display table name where keyword found
        echo '<h2 class="searchHeader">';
        switch ($i) {
            case 0:
                echo 'Gebruikers:';
                break;
            //Not really of much use to display the forum wherein a certain keyword is found
            /*case 1:
                echo 'Fora:';
                break;*/
            case 1:
                echo 'Topic titels:';
                break;
            case 2:
                echo 'Antwoorden in topics:';
                break;
            case 3:
                echo 'Evenementen:';
                break;
            case 4:
                echo 'In media:';
                break;
        }
        echo '</h2>';
        echo '<table class="search">';

        //get fieldnames table
        $fields = $table->list_fields();
        echo '<tr>';
        //iterate fieldnames as tableheader
        for ($k = 0; $k < count($fields); $k++) {
            //echo "<th>$field</th>";
            switch ($fields[$k]) {
                //Wont do much with following in terms of display:
                case 'user_id':
                case 'forum_id':
                case 'topic_id':
                case 'reply_id':
                case 'guest_id':
                    break;
                //Translate databasefields
                case 'username':
                    echo '<th>Gebruikersnaam</th>';
                    break;
                case 'topic_title':
                    echo '<th>Naam topic</th>';
                    break;
                case 'date':
                    echo '<th>Datum</th>';
                    break;
                case 'message':
                    echo '<th>Inleiding bericht</th>';
                    break;

                //In case all previous failed, should not be called 
                //(unless no different translation)
                default:
                    echo '<th>' . ucfirst($fields[$k]) . '</th>';
                    break;
            }
        }
        echo '</tr>';
        //get data table
        $values = $table->result();
        //iterate rows in table
        foreach ($values as $row) {
            //iterate columns in table
            echo '<tr>';
            for ($j = 0; $j < count($fields); $j++) {
                //For specified action at certain fields search
                //for match in switch else normal print
                switch ($fields[$j]) {
                    case 'avatar':
                        echo '<td><img class="avatarThumbmail" src="' . base_url() . 'assets/images/avatars/' . $row->$fields[$j] . '" alt="Avatar" width="150"/></td>';
                        break;
                    case 'user_id':
                        $user_id = $row->$fields[$j];
                        break;
                    case 'guest_id':
                        $user_id = $row->$fields[$j];
                        break;
                    case 'forum_id':
                        $forum_id = $row->$fields[$j];
                        break;
                    case 'topic_id':
                        $topic_id = $row->$fields[$j];
                        break;
                    case 'reply_id':
                        $reply_id = $row->$fields[$j];
                        break;
                    case 'username':
                        //I suspect weird behaviour when user_id = guest_id
                        echo '<td><a class="pageLink" href="' . base_url() . 'profile/index/' . $user_id . '">' . $row->$fields[$j] . '</a></td>';
                        break;
                    case 'forum_title':
                        echo '<td><a class="pageLink" href="' . base_url() . 'forum/topics/' . $forum_id . '">' . $row->$fields[$j] . '</a></td>';
                        break;
                    case 'topic_title':
                        echo '<td><a class="pageLink" href="' . base_url() . 'forum/replies/' . $topic_id . '">' . $row->$fields[$j] . '</a></td>';
                        break;
                    case 'message':
                        //display only first 160 characters
                        //check if text is longer -> add '..'
                        $message = substr($row->$fields[$j], 0, 160);
                        if ($message < count_chars($row->$fields[$j])) {
                            $message .= '..';
                        }
                        echo '<td>' . $message . '</td>'; //Need to shorten this, only show i.e. 160 characters, maybe anchorlink this
                        break;
                    case 'date':
                        $date = date('d/m/Y H:i', strtotime($row->$fields[$j]));
                        echo '<td>' . $date . '</td>';
                        break;
                    default:
                        echo '<td>' . $row->$fields[$j] . '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
echo '</div>';