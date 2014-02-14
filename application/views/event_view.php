<?php
/*
 * Author: Laurens
 * Created on: 13/02/2014
 */

$this->load->helper('form');
echo validation_errors();

echo '<h2>Evenement aanmaken</h2>';
echo '<div class="content">';
echo '<table class="form"><tr><td>';
echo form_open('event/openMap');
echo form_label('Naam:');
echo '</td><td>';
echo form_input('name', 'bijv. fuif', set_value('name'));
echo '</td></tr><tr><td>';
echo form_label('Plaatsnaam:');
echo '</td><td>';
echo form_input('details', 'Clubnaam', set_value('details'));
echo '</td></tr><tr><td>';
echo form_label('Waar:');
echo '</td><td>';
echo form_input('place', 'Geef een plaats in', set_value('place'));
echo '</td><td>';
echo form_submit('submit', '>');
echo '</td></tr><tr><td>';
echo form_label('Wanneer:');
echo '</td><td>';
echo '<input type="date" name="date">';
echo '</td><td>';
echo form_input('time', 'Tijd?', set_value('time'));
echo '</td></tr><tr><td>';
echo form_label('Genodigde:');
echo '</td><td>';
$options = array(
    '1' => 'Gasten',
    '2' => 'Gebruikers',
    '3' => 'Leden',
    '4' => 'Administrators'
);
echo form_dropdown('level', $options, set_value('level'));
echo '</td></tr></table>';
echo '<div class="right">';
echo anchor('event', 'Aanmaken', 'evenementen');
echo '</div>';
echo form_close();
echo '</div>';