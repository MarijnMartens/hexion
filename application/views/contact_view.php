<?php
/*
 * Author: Marijn
 * Created on: 11/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!is_null($error)) echo "<span class='error'>$error</span><br/>";

    echo form_open('welcome/contactProcess');
    echo form_label('Naam', 'name');
    echo form_input($data['name']);
    echo form_error('name');
    echo '<br/>';
    echo form_label('Email', 'email');
    echo form_input($data['email']);
    echo form_error('email');
    echo '<br/>';
    echo form_label('Onderwerp', 'subject');
    echo form_input($data['subject']);
    echo form_error('subject');
    echo '<br/>';
    echo form_label('Bericht', 'message');
    echo form_textarea($data['message']);
    echo form_error('message');
    echo '<br/>';
    echo $captcha;
    echo '<br/>';
    echo form_submit('submit', 'Stuur bericht naar Admin');
    echo form_close();
?>


<!-- BEGIN OUD -->
<?php /*echo form_open('welcome/contactProcess'); ?>
<table>
    <tr>
        <td><label for="name">Naam</label></td>
        <td><input type="text" name="name" placeholder="Naam" value="<?php echo $this->session->userdata('fName'); echo set_value('name'); ?>" size="20" /></td>
        <td><?php echo form_error('name'); ?></td>
    </tr>
    <tr>
        <td><label for="email">Email Adres</label></td>
        <td><input type="text" name="email" placeholder="Email" value="<?php echo $this->session->userdata('email'); echo set_value('email'); ?>" size="20" /></td>
        <td><?php echo form_error('email'); ?></td>
    </tr>
    <tr>
        <td><label for="subject">Onderwerp</label></td>
        <td><input type="text" name="subject" placeholder="Onderwerp" value="<?php echo set_value('subject'); ?>" size="70" /></td>
        <td><?php echo form_error('subject'); ?></td>
    </tr>
    <tr>
        <td><label for="message">Bericht Inhoud</label></td>
        <td><textarea name="message" rows="10" cols="80" wrap="soft" placeholder="Bericht"><?php echo set_value('message'); ?></textarea></td>
        <td><?php echo form_error('message'); ?></td>
    </tr>
        <?php echo $captcha; ?>
    <tr>
        <td colspan="3"><input type="submit" value="Stuur bericht naar Admin" /></td>
    </tr>
</table>
<?php
    echo form_close();
    */?>
<!-- EIND OUD -->
