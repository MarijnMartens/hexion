<?php
require_once APPPATH . 'libraries/facebook/facebook.php';

class Test_facebook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->config->load('facebook');
    }

    public function index()
    {
        $this->load->view('test_facebook_view');
    }

    public function logout()
    {
        $base_url = $this->config->item('base_url');
        $this->session->sess_destroy();
        header('Location: ' . $base_url);
    }

    function fblogin()
    {
        $base_url = $this->config->item('base_url');
        $facebook = new Facebook(array(
            'appId' => $this->config->item('appId'),
            'secret' => $this->config->item('appSecret')
        ));

        $user = $facebook->getUser();
        if ($user) {
            try {
                $user_profile = $facebook->api('/me');
                $params = array('next' => $base_url . 'test_facebook/logout');
                $ses_user = array(
                    'User' => $user_profile,
                    'logout' => $facebook->getLogoutUrl($params)
                );
                $this->session->set_userdata($ses_user);
                header('Location: ' . base_url());
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = null;
            }
        }
    }
}