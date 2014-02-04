<?php
/*
 * Author: Marijn
 * Created on: 20/12/2013
 * Edit on: 16/04/2014: Captcha added
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<h2>Vul in wat je nog weet</h2>
<?php
if (!is_null($error)) echo "<span class='error'>$error</span><br/>";
echo validation_errors();
echo form_open('login/password_reset');
echo form_label('Gebruikersnaam', 'username');
echo form_input($userdata['username']);
echo form_error('username');
echo '<br/>';
echo form_label('Email', 'email');
echo form_input($userdata['email']);
echo form_error('email');
echo '<br/>';
echo $captcha;
echo form_submit('submit', 'Stuur een nieuw wachtwoord!');
echo form_close();
?>
<?php /*<form action='<?php echo base_url(); ?>login/password_reset' method='post' name='password_reset'>
    <?php  ?>
    <table>
        <tr>
            <td><label for='username'>Gebruikersnaam</label></td>
            <td><input type='text' name='username' id='username' size='25' /></td>
        </tr>
        <tr>
            <td><label for='email'>Email adres</label></td>
            <td><input type='text' name='email' id='email' size='25' /></td>
        </tr>
        <?php echo $captcha; ?>
        <tr>
            <td colspan="2"><input type='submit' value='Stuur een nieuw paswoord!' /></td>
        </tr>
    </table>
</form>*/?>