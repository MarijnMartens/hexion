<?php
/*
 * Author: Marijn
 * Created on: 20/12/2013
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed'); ?>

<h2>Fora</h2>
<div class="content">
    <p>
    <table>
        <?PHP
        //Print all forums where user_level >= forum_level
        foreach ($forums as $forum) {
            echo $forum;
        }
        ?>
    </table>
    </p>
</div>
