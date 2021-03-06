<?php

/*
 * Author: Marijn
 * Created on: 20/12/2013
 * Last modified on: 04/01/2014
 * Edit: 04/01/2014: Insert new topic
 * References: none
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Topic_model extends CI_Model
{

    //get all data from one topic
    public function getData($topic_id)
    {
        $this->db->where('id', $topic_id);
        $query = $this->db->get('topic');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    //return list of topics
    public function getTopics($forum_id)
    {
        $this->db->select('topic.*, user.username');
        $this->db->from('topic');
        $this->db->join('user', 'topic.user_id = user.id');
        $this->db->where('topic.forum_id', $forum_id);
        $this->db->order_by('topic.date', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    //return count of topics
    public function getCount($forum_id)
    {
        $this->db->select('count(*) as count');
        $this->db->from('topic');
        $this->db->where('forum_id', $forum_id);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row()->count;
        } else {
            return false;
        }
    }

    //get views per topic
    public function getViews($topic_id)
    {
        $this->db->select('count');
        $this->db->where('id', $topic_id);
        $query = $this->db->get('topic');

        if ($query->num_rows() == 1) {
            return $query->row()->count;
        } else {
            return false;
        }
    }

    //increase views by one
    public function addViews($topic_id)
    {
        $query = $this->getViews($topic_id);
        $data = array(
            'count' => $query + 1
        );
        $this->db->where('id', $topic_id);
        $this->db->update('topic', $data);
    }

    //return list of topic id's from one forum, 
    //used for reply counter in forum
    public function getAll($forum_id)
    {
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->where('forum_id', $forum_id);
        $query = $this->db->get();
        // Let's check if there are any results
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    //insert new topic
    public function insert($forum_id, $user_id, $title)
    {
        //prepare data
        $data = array(
            'forum_id' => $forum_id,
            'user_id' => $user_id,
            'title' => $title
        );
        //insert data
        $this->db->insert('topic', $data);
        $query = $this->db->affected_rows();
        //check if insert was successfull
        if ($query == 1) {
            //return topic_id we just created
            $this->db->select('MAX(id) as max_id');
            $this->db->from('topic');
            $query = $this->db->get();
            return $query->row()->max_id;
        } else {
            return FALSE;
        }
    }

    //delete given topic
    public function delete($topic_id)
    {
        $this->db->where('id', $topic_id);
        $this->db->delete('topic');
        $query = $this->db->affected_rows();
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //close (read-only) give topic
    public function close($topic_id)
    {
        $title = $this->getTitle($topic_id);
        if (!$title) {
            return FALSE;
        }
        $data = array(
            'title' => "[Gesloten] $title",
            'status' => '0'
        );
        $this->db->where('id', $topic_id);
        $this->db->update('topic', $data);
        $query = $this->db->affected_rows();
        if ($query == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
