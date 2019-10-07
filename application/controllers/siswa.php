<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class siswa extends CI_Controller {

    //fungsi yang akan dijalankan saat classnya diinstansiasi
    //public function __construct()
    //{
        //digunakan untuk menjalankan fungsi construct pada class parent::__controller
    //    parent::__construct();
    //    $this->load->database();
    //}
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parent::__controller
        parent::__construct();
        $this->load->model('siswa_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        // $this->load->model('siswa_model');

        // modul untuk load database
        // $this->load->database();

        $data['title']='List siswa';
        $data['siswa']=$this->siswa_model->getallsiswa();
        
        
        if($this->input->post('keyword'))
        //code...
            $data ['siswa'] = $this->siswa_model->cariDataSiswa();
            


        $this->load->view('template/header',$data);
        $this->load->view('siswa/index',$data);
        $this->load->view('template/footer');

    }
    public function tambah(){
        //$this->load->library('form_validation');
        $data['title']="FORM MENAMBAH DATA SISWA";
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('nim','Nim','required|numeric');
        $this->form_validation->set_rules('alamat','alamat','required');
        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('siswa/tambah',$data);
            $this->load->view('template/footer');
        }
        else{
            $this->siswa_model->tambahDataSw();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('siswa','refresh');
            
        }
       
    }
    public function hapus($id){
        $this->siswa_model->hapusdatasw($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('siswa','refresh');

    }
    public function edit($id){
        $data['title']="FORM MENAMBAH DATA SISWA";
        $data['siswa']=$this->siswa_model->getsiswaByID($id);
        $this->form_validation->set_rules('id','id','required|numeric');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('nim','Nim','required|numeric');
        $this->form_validation->set_rules('alamat','alamat','required ');
        
        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('siswa/edit',$data);
            $this->load->view('template/footer');
        }
        else{
            $this->siswa_model->tambahDatasw();
            $this->session->set_flashdata('flash-data','diedit');
            redirect('siswa','refresh');
            
        }
    }
    public function detail($id){
        $data['title'] ='Detail Mahasiswa';
        $data['siswa']=$this->siswa_model->getsiswaByID($id);
        $this->load->view('template/header',$data);
        $this->load->view('siswa/detail',$data);
        $this->load->view('template/footer');
    }
}
/* End of file Controllername.php */
?>