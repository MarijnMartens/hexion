<?php
/*
 * Author: Laurens
 * Created on: 29/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event_model extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM event');

        return $query->result();
    }

    /*public function insertRow($data)
    {
        $query = $this->db->get('event');

        $data = array(
            'description' => $row->description,
            'details' => $row->details,
            'place' => $row->place,
            'date' => $row->date,
            'time' => $row->time,
            'level' => $row->level,
            'theme' => $row->theme
        );

        $this->session->set_userdata($data);

    }*/

    public function edit($data)
    {
        $this->db->update('event', $data, 'user_id = 21');
    }

}
