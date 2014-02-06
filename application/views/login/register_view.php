<!-- 
Author: Marijn
Created on: 20/12/2013
References: none
-->
<?php if (!is_null($error)) echo "<span class='error'>$error</span><br/>";
echo form_open('login/register');
echo form_label('Gebruikersnaam', 'username');
echo form_input($userdata['username']);
echo form_error('username');
echo '<br/>';
echo form_label('Wachtwoord', 'password');
echo form_password($userdata['password']);
echo form_error('password');
echo '<br/>';
echo form_label('Herhaal wachtwoord', 'passwordConf');
echo form_password($userdata['passwordConf']);
echo form_error('passwordConf');
echo '<br/>';
echo form_label('Email', 'email');
echo form_input($userdata['email']);
echo form_error('email');
echo '<br/>';
echo form_submit('submit', 'Registreer nu!', "class='submit'");
echo form_close();
?>