<!-- 
Author: Marijn
Created on: 10/01/2014
References: none
-->

<?php 
if (!is_null($error)) echo "<span class='error'>$error</span><br/>";
echo form_open('forum/insertTopicProcess'); 
echo form_label('Topic-naam', 'title');
echo form_input($userdata['title']);
echo form_error('title');
echo '<br/>';
echo form_label('Openingspost', 'reply');
echo form_textarea($userdata['reply']);
echo form_error('reply');
echo '<br/>';
echo form_submit('submit', 'Maak topic aan');
echo form_close();
?>
<?php  /*
<table>
    <tr>
        <td><label for="title">Topic-naam</label></td>
        <td><input type="text" name="title" placeholder="Topic-naam" value="<?php echo set_value('title'); ?>" size="70" /></td>
        <td><?php echo form_error('title'); ?></td>
    </tr>
    <tr>
        <td><label for="reply">Open post</label></td>
        <td><textarea name="reply" rows="10" cols="80" wrap="soft" placeholder="Hier je openingspost"><?php echo set_value('reply'); ?></textarea></td>
        <td><?php echo form_error('reply'); ?></td>
    </tr>
    <tr>
        <td colspan="3"><input type="submit" value="Maak topic aan" /></td>
    </tr>
</table>
<?php echo form_close();*/ ?>