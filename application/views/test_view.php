<?php

/* 23
 * Author: Marijn
 * Created on: 11/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

foreach ($result as $row) {
    echo '<a href="' . base_url() . 'test/listTopics/' . $row->id . '">' . $row->title . '</a>';
    echo '<br/>';
}