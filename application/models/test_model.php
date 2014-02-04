<?php

/*
 * Author: Marijn
 * Created on: 11/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test_model extends CI_Model{
    
    //return list of topics
    public function getTopics($forum_id, $limit=0, $start=0) {
        $this->db->from('topic');
        $this->db->where('forum_id', $forum_id);
        $this->db->order_by('date', 'desc');
        if($limit > 0){
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result();
    }
    //return count of topics
    public function getCount($forum_id) {
        $this->db->select('count(*) as count');
        $this->db->from('topic');
        $this->db->where('forum_id', $forum_id);
        $query = $this->db->get();
        return $query->row()->count;
    }
    
    //get all forums user has access to
    public function getForums() {
        $this->db->order_by('id');
        $query = $this->db->get('forum');
        return $query->result();
    }
}
