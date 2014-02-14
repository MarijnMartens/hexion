<?php
/*
 * Author: Laurens
 * Created on: 29/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event extends CI_Controller {

    public function index() {
        $this->load->model('event_model');

        $bodyData['results'] = $this->event_model->getAll();

        $bodyData['title'] = 'Evenementen';
        $bodyData['view'] = 'upcoming_event_view';
        //$this->load->view('template/tmpHeader_view', $bodyData);
        //$this->getValues();
        //$this->load->view('template/tmpFooter_view');
        $this->load->view('template/tmpPage_view', $bodyData);

    }

    public function getValues()
    {


        //$this->load->view('upcoming_event_view', $data);

        //upload theme
        $config['upload_path'] = './assets/images/themes/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['max_width'] = '2000';
        $config['max_height'] = '1300';

        $this->load->library('upload', $config);
    }

    public function editValues()
    {
        $this->load->model('event_model');

        $newRow = array(
            'city' => 'Hasselt',
            'place' => 'Versuz',
            'theme' => 'hexion.gif'
        );

        $this->event_model->edit($newRow);
    }

    /* public function insertValues()
     {
         $this->load->model("event_model");
         $this->event_model->insertRow($newRow);
     }*/

    public function makeEvent()
    {
        $this->load->library('form_validation');
        //rules to make an event
        $this->form_validation->set_rules('description', 'fuifnaam', 'required|');
        $this->form_validation->set_rules('details', 'plaatsnaam', 'required');
        $this->form_validation->set_rules('place', 'plaats', 'required');
        $this->form_validation->set_rules('date', 'datum', 'required');
        $this->form_validation->set_rules('time', 'tijdstip', 'required');
        $this->form_validation->set_rules('level', 'bestemd voor', 'required');

        if ($this->form_validation->run() == FALSE) {
            //user didn't meet recuirements, send back to makeEvent page
            $bodyData['title'] = 'Nieuw evenement';
            //$this->load->view('template/tmpHeader_view', $bodyData);
            $bodyData['view'] = 'event_view';
            $this->load->view('template/tmpPage_view', $bodyData);
            //$this->load->view('template/tmpFooter_view');
        } else {
            // succesfull
            $data['results'] = $this->event_model->getAll();

            $this->load->view('upcoming_event_view', $data);

            //upload theme
            $config['upload_path'] = './assets/images/themes/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1024';
            $config['max_width'] = '2000';
            $config['max_height'] = '1300';

            $this->load->library('upload', $config);

            $description = $this->input->post('description');
            $details = $this->input->post('details');
            $place = $this->input->post('place');
            $date = $this->input->post('date');
            $time = $this->input->post('time');
            $level = $this->input->post('level');
            $theme = $this->input->post('theme');

            $this->load->model('login_model');

            $this->load->view('upcoming_event_view', $data);

        }
    }

    public function openMap()
    {
        $bodyData['title'] = 'Nieuw evenement';
        $this->load->view('template/tmpHeader_view', $bodyData);
        $this->load->view('map_view');
        $this->load->view('template/tmpFooter_view');
    }
}

