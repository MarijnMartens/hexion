<?php

/*
 * Author: Marijn
 * Created on: 20/12/2013
 * Last modified on: 04/01/2014
 * Edit: 26/12/2013: Email password reset
 * Edit: 04/01/2014: Logout function
 * Edit: 08/01/2014: Translated errors, reducing code
 * Edit: 03/02/2014: Form to controller
 * References: 
 * - Basic login control: http://www.jotorres.com/2012/03/create-user-login-with-codeigniter/
 * - Session control: http://www.sparklepod.com/myblog/codeigniter-session-and-login-tutorial/
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{

    //inloggen
    public function index($error = NULL)
    {
        //Call form validation-library
        $this->load->library('form_validation');
        //prepare form fields, fill value where provided
        $usernameField = array(
            'name' => 'username',
            'id' => 'username',
            'placeholder' => 'Gebruikersnaam',
            'value' => set_value('username')
        );
        $passwordField = array(
            'name' => 'password',
            'id' => 'password',
            'placeholder' => 'Wachtwoord'
        );
        $bodyData['userdata'] = array(
            'username' => $usernameField,
            'password' => $passwordField
        );
        $bodyData['title'] = 'Login';
        $bodyData['error'] = $error;
        $bodyData['aside_visible'] = 'false';
        $bodyData['view'] = 'login/login_view';
        $this->load->view('template/tmpPage_view', $bodyData);
    }

    public function login_process()
    {
        // grab user input
        // security handled in config.php
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate($username, $password);
        // Now we verify the result
        if (!$result) {
            // If user did not validate, then show them login page again
            $error = 'Gebruikersnaam en/of paswoord incorrect';
            $this->index($error);
        } else {
            // If user did validate, 
            // Send them to members area
            redirect('welcome');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->index('Tot ziens!');
    }

    //register
    public function register($error = NULL)
    {
        //call captcha-library
        $this->load->library('MyCaptcha');
        //Call for methods
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

        //Input field validation
        $this->form_validation->set_rules(
            'username', 'Gebruikersnaam', 'required|'
            . 'min_length[3]|'
            . 'max_length[20]|'
            . 'callback_register_username_check|'
            . 'is_unique[user.username]'
        );
        $this->form_validation->set_rules(
            'password', 'Paswoord', 'required|'
            . 'min_length[3]|'
            . 'matches[passwordConf]'
        );
        $this->form_validation->set_rules(
            'passwordConf', 'Herhaling paswoord', 'required|'
        );
        $this->form_validation->set_rules(
            'email', 'Email adres', 'required|'
            . 'valid_email|'
            . 'is_unique[user.email]'
        );

        //Validation form
        if ($this->form_validation->run() == FALSE) {
            $usernameField = array(
                'name' => 'username',
                'id' => 'username',
                'size' => '35',
                'placeholder' => 'Gebruikersnaam',
                'value' => set_value('username')
            );
            $passwordField = array(
                'name' => 'password',
                'id' => 'password',
                'size' => '35',
                'placeholder' => 'Wachtwoord',
                'value' => set_value('password')
            );
            $passwordConfField = array(
                'name' => 'passwordConf',
                'id' => 'passwordConf',
                'size' => '35',
                'placeholder' => 'Herhaal wachtwoord',
                'value' => set_value('passwordConf')
            );
            $emailField = array(
                'name' => 'email',
                'id' => 'email',
                'size' => '35',
                'placeholder' => 'Email',
                'value' => set_value('email')
            );
            $bodyData['userdata'] = array(
                'username' => $usernameField,
                'password' => $passwordField,
                'passwordConf' => $passwordConfField,
                'email' => $emailField
            );
            $captcha = $this->mycaptcha->showCaptcha();
            $bodyData['title'] = 'Register';
            $bodyData['captcha'] = $captcha;
            $bodyData['error'] = $error;
            $bodyData['aside_visible'] = 'false';
            $bodyData['view'] = 'login/register_view';
            $this->load->view('template/tmpPage_view', $bodyData);
        } else { //Validation is OK, open model to insert new user
            $this->load->model('register_model');
            $result = $this->register_model->setUsers(
                ucfirst($this->input->post('username')), $this->input->post('password'), $this->input->post('email')
            );
            if (!$result) { //Model did not insert data in database
                $error = 'Invoer in database is mislukt';
                $this->register($error);
            } else {
                $this->login_process();
            }
        }
    }

    //'Admin' is not allowed as username to not confuse other users
    //Just as an example, in real world scenario I would use a preg_match where I look for
    //matches between the username and an array full of forbidden words)
    public function register_username_check($str)
    {
        if (!strcasecmp($str, 'admin')) { //strcasecmp is case insensitive
            $this->form_validation->set_message('username_check', '%s is niet toegelaten als gebruikersnaam');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function password_forget($error = NULL)
    {
        //call captcha-library
        $this->load->library('MyCaptcha');
        $usernameField = array(
            'name' => 'username',
            'id' => 'username',
            'size' => '35',
            'placeholder' => 'Gebruikersnaam',
            'value' => set_value('username')
        );
        $emailField = array(
            'name' => 'email',
            'id' => 'email',
            'size' => '35',
            'placeholder' => 'Email',
            'value' => set_value('email')
        );
        $bodyData['userdata'] = array(
            'username' => $usernameField,
            'email' => $emailField
        );
        //Display page
        $bodyData['title'] = 'Vraag nieuw paswoord aan';
        $captcha = $this->mycaptcha->showCaptcha();
        $bodyData['error'] = $error;
        $bodyData['captcha'] = $captcha;
        $bodyData['aside_visible'] = 'false';
        $bodyData['view'] = 'login/passwordReset_view';
        $this->load->view('template/tmpPage_view', $bodyData);
    }

    //Forgot password
    public function password_reset()
    {
        //call captcha-library
        $this->load->library('MyCaptcha');
        //Call for methods
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        //Input field validation
        $this->form_validation->set_rules(
            'username', 'Gebruikersnaam', 'min_length[3]|'
            . 'max_length[20]'
        );
        $this->form_validation->set_rules(
            'email', 'Email adres', 'valid_email'
        );

        $username = $this->input->post('username');
        $email = $this->input->post('email');

        //Validation form
        if ($this->form_validation->run() == FALSE) {
            $this->password_forget();
        } else { //First validation is ok
            //Check at least one field is filled
            if ($username == '' && $email == '') {
                $error = 'Vul op zijn minst 1 van de velden in';
                $this->password_forget($error);
            } else {
                //Validations both OK, go on with transaction
                //Check captcha
                $captcha = $this->mycaptcha->validateCaptcha();
                if (!$captcha) {
                    $error = 'We konden niet vaststellen dat je een mens bent, probeer nogmaals';
                    $this->password_forget($error);
                } else {
                    $this->load->model('password_model');
                    $result = $this->password_model->reset($username, $email);
                    if (!$result) { //Model did not insert data in database
                        $error = 'Gebruikersnaam of email adres is fout';
                        $this->password_forget($error);
                    } else {
                        if ($username == '') {
                            //$username = $this->session->flashdata('username');
                            $username = $result['username'];
                        }
                        if ($email == '') {
                            //$email = $this->session->flashdata('email');
                            $email = $result['email'];
                        }
                        // Send them email
                        $this->load->model('email_model');
                        $result = $this->email_model->mail('do-not-reply@hexioners.be', 'VOS@50eten', 'Reset paswoord Hexioners.be', 'Hallo ' . $username . ', <br/> je nieuwe wachtwoord is <b>' . $result['password'] . '</b>.', $email
                        );
                        if (!$result) {
                            $error = 'De mailserver is even ziek, probeer later opnieuw';
                            $this->password_forget($error);
                        } else {
                            $this->index($error = '<span style="color:blue;">Een email werd naar ' . $email . ' verzonden.</span>');
                        }
                    }
                }
            }
        }
    }

}
