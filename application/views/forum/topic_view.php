<?php
/*
 * Author: Marijn
 * Created on: 04/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<h2>Topics</h2>
<div class="content">
    <p><a href="<?php echo base_url('forum/insertTopic'); ?>">Nieuw topic</a></p>

    <p>

    <table>
        <?php echo "$count Topics"; ?>
        <?php
        foreach ($topics as $topic) {
            echo $topic;
        }
        ?>
    </table>
    </p>
</div>
