<?php


defined('BASEPATH') OR exit('No direct script access allowed');
class usersiswa extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('loginsiswa_model');
        $this->load->model('siswa_model');
        //$this->load->library('session');
        if ($this->session->userdata('level') != 'siswa' ) {
            
            redirect('loginsiswa','refresh');
            
        }
        
    }

    public function index()
    {
        $data = array(
            'title'=>'data siswa',
            'siswa'=>$this->siswa_model->datatabels()
        );
        $this->load->view('template/header_datatabels_users',$data);
        $this->load->view('siswa/user');
        $this->load->view('template/footer_datatabels_users');
    }

    public function laporan_pdf()
    {
        $this->load->library('pdf');
        $this->load->model('cetaksiswa_model');
        $data['siswa']= $this->cetaksiswa_model->view();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('siswa/laporan',$data);
    }
}
?>