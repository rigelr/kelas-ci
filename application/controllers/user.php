<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parent::__controller
        parent::__construct();
        if ($this->session->userdata('level') != 'user') {
            redirect('login', 'refresh');
            }
        // $this->load->helper('url');
        // $this->load->helper('form');
        // $this->load->model('login_model');
    }


    public function index()
    {
        $data['title'] = 'Halaman User';
        $this->load->view('template/header',$data);
        $this->load->view('mahasiswa/user');
        $this->load->view('template/footer');
        
    }
}
?>
