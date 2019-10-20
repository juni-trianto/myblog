<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('username') == true) {
            redirect('Dashboard');
        }
    }

    public function index()
    {
        $this->load->view('admin/register');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('admin/register');
        } else {
            $username = $this->input->post('username');
            $email    = $this->input->post('email');
            $password = $this->input->post('password');
            $this->Auth_model->register($username, $email, $password);
            redirect('auth/login');
        }
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $chek =  $this->Auth_model->login($username, $password);

            if ($chek == 1) {
                $this->session->set_userdata(['username' => $username]);

                redirect('Dashboard');
            } else {
                redirect('auth/login');
            }
        } else {

            $this->load->view('admin/login');
        }
    }
}
