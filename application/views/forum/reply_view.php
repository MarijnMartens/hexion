<?php
/*
 * Author: Marijn
 * Created on: 04/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2><?php $count; ?> antwoorden</h2>
<div class="content">
    <p><a href="<?php echo base_url('forum/insertReply'); ?>">Insert new reply</a></p>
    <table>
        <?php foreach ($replies as $reply) {
            //different background-color tr in table
            $alt = null;
            if ($reply->id % 2) {
                $alt = 'class="alt"';
            }
            $edit = false;
            ?>
            <tr <?php echo $alt; ?>>
                <td class="forum"><?php echo $reply->date; ?></td>
                <td class="forum"><?php
                    $edit = false;
                    if ($reply->username != NULL) {
                        echo '<a href="' . base_url("profile/view/$reply->user_id") . '">' . $reply->username . '</a>';
                        echo '<img class="avatarThumbmail" src="' . base_url() . 'assets/images/avatars/' . $reply->avatar . '" alt="Avatar" width="150"/>';
                        if ($reply->user_id == $this->session->userdata('user_id')) {
                            $edit = true;
                        } else if ($this->session->userdata('level') >= 3) {
                            $edit = true;
                        }
                    } else {
                        echo 'Gast' . $reply->guest_id;
                        if ($reply->guest_id == $this->input->cookie('guest_id')) {
                            $edit = true;
                        }
                    }
                    ?></td>
                <td class="forum"><?php echo nl2br($reply->message); ?></td>
                <?php if ($edit == true && $reply->mod_break == false) { ?>
                    <td><a href="<?php echo base_url("forum/editReply/$reply->id"); ?>">Edit reply</a></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    <p style="text-align: right;"><a href="<?php echo base_url('forum/insertReply'); ?>">Insert new reply</a></p>
</div>
