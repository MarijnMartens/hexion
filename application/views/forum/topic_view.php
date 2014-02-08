<?php
/*
 * Author: Marijn
 * Created on: 04/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2><?php echo $count; ?> Topics</h2>
<div class="content">
    <div class="right"><a href="<?php echo base_url('forum/insertTopic'); ?>" class="submit">Nieuw topic</a></div>
    <table>
        <?php
        foreach ($topics as $topic) {
            echo $topic;
        }
        ?>
    </table>
    <div class="right"><a href="<?php echo base_url('forum/insertTopic'); ?>" class="submit">Nieuw topic</a></div>
</div>
