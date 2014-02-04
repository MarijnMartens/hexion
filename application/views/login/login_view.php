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
echo form_submit('submit', 'Log mij nu in!');
echo form_close();
?>
<?php /*<form action='<?php echo base_url(); ?>login/login_process' method='post' name='process'>
       
    <table>
        <tr>
            <td><label for='username'>Gebruikersnaam</label></td>
            <td><input type='text' name='username' id='username' size='20' /></td>
        </tr>
        <tr>
            <td><label for='password'>Paswoord</label></td>
            <td><input type='password' name='password' id='password' size='20' /></td>
        </tr>
        <tr>
            <td colspan="2"><input type='submit' value='Log mij nu in!' /></td>
        </tr>
    </table>
</form>*/ ?>
<a href="<?php echo base_url(); ?>login/password_reset">Paswoord vergeten?</a>