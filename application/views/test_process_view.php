<?php

/*
 * Author: Marijn
 * Created on: 11/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

echo $pagination;
echo '<br/>';

foreach ($result as $row){
echo $row->title;
echo '<br/>';
}

?>