<?php

class Test extends CI_Controller
{

    public function index()
    {
        $this->load->model('test_model');

        //get result
        $result = $this->test_model->getForums();
        $bodyData['result'] = $result;
        $bodyData['title'] = 'Zoekresultaten';
        $bodyData['view'] = 'test_view';
        $this->load->view('template/tmpPage_view', $bodyData);

    }

    public function listTopics($forum_id)
    {
        $this->load->model('test_model');

        $count = $this->test_model->getCount($forum_id);

        //pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'test/listTopics/' . $forum_id . '/';
        $config['total_rows'] = $count;
        $config['per_page'] = 1;
        //$config['num_links'] = 1;
        $this->pagination->initialize($config);

        //get result
        $result = $this->test_model->getTopics($forum_id, $config['per_page'], $this->uri->segment(4));

        $bodyData['pagination'] = $this->pagination->create_links();
        $bodyData['result'] = $result;
        $bodyData['title'] = 'Zoekresultaten';
        $bodyData['view'] = 'test_process_view';
        $this->load->view('template/tmpPage_view', $bodyData);
    }

}