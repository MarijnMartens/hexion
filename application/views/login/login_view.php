<!-- 
Author: Marijn
Created on: 20/12/2013
References: none
-->

<h2>Log in form</h2>
<?php if (!is_null($error)) echo "<span class='error'>$error</span><br/>"; ?> 
<?php
echo form_open('login/login_process');
echo form_label('Gebruikersnaam', 'username');
echo form_input($userdata['username']);
echo '<br/>';
echo form_label('Wachtwoord', 'password');
echo form_password($userdata['password']);
echo '<br/>';
echo form_submit('submit', 'Log mij nu in!', 'class="submit"');
echo '<a href="' . base_url() . '>login/password_reset" class="blackLink" >Paswoord vergeten?</a>';
echo form_close();
?>