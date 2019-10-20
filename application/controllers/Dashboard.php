<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');

        if ($this->session->userdata('username') == false) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['record'] = $this->Dashboard_model->tampilkan()->result_array();
        $this->load->view('templates/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        session_destroy();
        redirect('auth/login');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');

        if (isset($_POST['submit'])) {
            if ($this->form_validation->run() == true) {

                $judul = $this->input->post('judul', true);
                $isi   = $this->input->post('isi', true);
                $kategori = $this->input->post('kategori', true);
                $this->Dashboard_model->tambah($judul, $isi, $kategori);
                redirect('Dashboard');
            } else {
                $this->load->view('templates/header');
                $this->load->view('dashboard/form_input');
                $this->load->view('templates/footer');
            }
        } else {

            $this->load->view('templates/header');
            $this->load->view('dashboard/form_input');
            $this->load->view('templates/footer');
        }
    }

    public function page()
    {
        $id = $this->uri->segment(3);
        $data['record'] = $this->Dashboard_model->page($id)->row_array();
        $this->load->view('templates/header');
        $this->load->view('dashboard/pages', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->Dashboard_model->delete($id);
        redirect('Dashboard');
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $id     = $this->input->post('id');
            $judul = $this->input->post('judul', true);
            $isi   = $this->input->post('isi', true);
            $kategori = $this->input->post('kategori', true);
            $this->Dashboard_model->post($id, $judul, $isi, $kategori);
            redirect('Dashboard');
        } else {

            $id = $this->uri->segment(3);
            $data['record'] = $this->Dashboard_model->edit($id)->row_array();
            $this->load->view('templates/header');
            $this->load->view('dashboard/form_edit', $data);
            $this->load->view('templates/footer');
        }
    }
}
