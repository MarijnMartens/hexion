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
    <div class="right"><a href="<?php echo base_url('forum/insertReply'); ?>" class="submit">Insert new reply</a></div>
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
                <td class="forum"><?php
                    $edit = false;
                    if ($reply->username != NULL) {
                        echo '<img class="avatar" style="max-height: 75px; width: 50px;" src="' . base_url() . 'assets/images/avatars/' . $reply->avatar . '" alt="Avatar"/><br/>';
                        echo '<a href="' . base_url("profile/index/$reply->user_id") . '" class="pageLink">' . $reply->username . '</a><br/>';

                        if ($reply->user_id == $this->session->userdata('user_id')) {
                            $edit = true;
                        } else if ($this->session->userdata('level') >= 3) {
                            $edit = true;
                        }
                    } else {
                        echo 'Gast' . $reply->guest_id . '<br/>';
                        if ($reply->guest_id == $this->input->cookie('guest_id')) {
                            $edit = true;
                        }
                    }
                    echo $reply->date;
                    ?>
                </td>
                <td class="forum"><?php echo nl2br($reply->message); ?></td>
                <td>
                    <?php if ($edit == true && $reply->mod_break == false) { ?>
                        <a href="<?php echo base_url("forum/editReply/$reply->id"); ?>" class="blackLink">Edit reply</a>

                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="right"><a href="<?php echo base_url('forum/insertReply'); ?>" class="submit">Insert new reply</a></div>
</div>
