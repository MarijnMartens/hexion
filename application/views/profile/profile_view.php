<?php
/*
 * Author: Marijn
 * Created on: 11/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Profiel van <?php echo $userdata->username; ?></h2>
<div class="content">
    <?php
    $months = array(1 => 'Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December');
    if ($userdata->gender == 'm') {
        $gender = 'Man';
    } else if ($userdata->gender == 'f') {
        $gender = 'Vrouw';
    } else {
        $gender = '';
    }
    $dateOfBirth = $userdata->dateOfBirth;
    $dateOfBirth2 = explode('-', $dateOfBirth);
    echo '<div class="divBox">';
    echo '<img class="avatar" src="' . base_url() . 'assets/images/avatars/' . $userdata->avatar . '" alt="Avatar" width="150"/>';
    echo '</div>';
    echo '<div class="divBox">';
    echo '<table class="form"><tr><td>';
    echo 'Voornaam: ';
    echo '</td><td>';
    echo $userdata->fName;
    echo '</td></tr><tr><td>';
    echo 'Achternaam: ';
    echo '</td><td>';
    echo $userdata->lName;
    echo '</td></tr><tr><td>';
    echo 'Geslacht: ';
    echo '</td><td>';
    echo $gender;
    echo '</td></tr><tr><td>';
    echo 'Geboren op: ';
    echo '</td><td>';
    if ($dateOfBirth != '') {
        $monthDigit = ltrim($dateOfBirth2[1], '0'); //remove starting 0 if present
        echo $dateOfBirth2[2] . ' ' . $months[$monthDigit] . ' ' . $dateOfBirth2[0];
    } else {
        echo '';
    }
    echo '</td></tr><tr><td>';
    echo 'Regio: ';
    echo '</td><td>';
    echo $userdata->city;
    echo '</td></tr></table>';
    echo '</div>';
    ?>

    <?php if ($this->session->userdata('user_id') == $userdata->id) { ?>
        <div class="right">
            <a href="<?PHP echo base_url('profile/edit'); ?>" class="submit">Pas gegevens aan</a>
        </div>
    <?php } ?>
</div>