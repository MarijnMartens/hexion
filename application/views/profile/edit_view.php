<?php
/*
 * Author: Marijn
 * Created on: 11/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Edit profile</h2>
<div class="content">
    <?php
    if (!is_null($error)) {
        echo "<span class='error'>$error</span><br/>";
    }
    $this->load->helper('form');
    $this->load->helper('date');
    $days = array(1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
    $months = array(1 => 'Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December');
    $years = null;
    for ($i = date('Y') - 16; $i >= date('Y') - 70; $i--) {
        $years[$i] = $i;
    }
    echo form_open('profile/saveSecure');
    echo '<table class="form"><tr><td>';
    echo form_label('Email', 'email');
    echo '</td><td>';
    echo form_input($userdata['email']);
    echo '</td><td>';
    echo form_error('email');
    echo '</td></tr><tr><td>';
    echo form_label('Herhaal Email', 'emailConf');
    echo '</td><td>';
    echo form_input($userdata['emailConf']);
    echo '</td><td>';
    echo form_error('emailConf');
    echo '</td></tr><tr><td>';
    echo form_label('Nieuw wachtwoord', 'password');
    echo '</td><td>';
    echo form_password($userdata['password']);
    echo '</td><td>';
    echo form_error('password');
    echo '</td></tr><tr><td>';
    echo form_label('Herhaal nieuw wachtwoord', 'passwordConf');
    echo '</td><td>';
    echo form_password($userdata['passwordConf']);
    echo '</td></tr><tr><td>';
    echo form_label('Oud wachtwoord', 'passwordOld');
    echo '</td><td>';
    echo form_password($userdata['passwordOld']);
    echo '</td><td>';
    echo form_error('passwordOld');
    echo '</td></tr><tr><td>';
    echo form_submit('submit', 'Wijzig login gegevens', 'class="submit"');
    echo '</td></tr><tr><td><br><br></td></tr><tr><td>';
    echo form_close();

    echo form_open_multipart('profile/save');
    echo form_label('Avatar', 'userfile');
    echo '</td><td>';
    echo form_upload($userdata['avatar']);
    echo '</td></tr><tr><td>';
    echo form_label('Voornaam', 'fName');
    echo '</td><td>';
    echo form_input($userdata['fName']);
    echo '</td><td>';
    echo form_error('fName');
    echo '</td></tr><tr><td>';
    echo form_label('Achternaam', 'lName');
    echo '</td><td>';
    echo form_input($userdata['lName']);
    echo '</td><td>';
    echo form_error('lName');
    echo '</td></tr><tr><td>';
    echo form_label('Geboortedatum', 'dateOfBirth');
    echo '</td><td>';
    //if data is empty take first of list
    if ($userdata['dateOfBirth'] == '') {
        $dateOfBirth[0] = key($years);
        $dateOfBirth[1] = key($months);
        $dateOfBirth[2] = key($days);
    } else {
        $dateOfBirth = explode('-', $userdata['dateOfBirth']);
    }
    echo form_dropdown('day', $days, $dateOfBirth[2]);
    echo '-';
    echo form_dropdown('month', $months, $dateOfBirth[1]);
    echo '-';
    echo form_dropdown('year', $years, $dateOfBirth[0]);
    echo '</td></tr><tr><td>';
    echo form_label('Geslacht', 'gender');
    echo '</td><td>';
    echo 'Man';
    echo form_radio($userdata['genderM']);
    echo ' Vrouw';
    echo form_radio($userdata['genderF']);
    echo '</td></tr><tr><td>';
    echo form_label('Locatie', 'city');
    echo '</td><td>';
    echo form_input($userdata['city']);
    echo '</td><td>';
    echo form_error('city');
    echo '</td></tr><tr><td>';
    echo form_submit('submit', 'Wijzig persoonlijke gegevens', 'class="submit"');
    echo '</td></tr></table>';
    echo form_close();

    echo '<br/><br/>';

    //Do not change anyting
    echo '<div class="right"><a href="' . base_url() . 'profile" class="blackLink">Annuleer</a></div>';
    ?>
</div>