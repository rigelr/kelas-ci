<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parent::__controller
        parent::__construct();
        $this->load->model('mahasiswa_model');
        $this->load->library('form_validation');

        if($this->session->userdata('level')!="admin"){
            
            redirect('login','refresh');
            
        }
    }

    public function index()
    {
        //$this->load->model('mahasiswa_model');
        //$this->load->database();
        $data['title']='List Mahasiswa';
        $data['mahasiswa']=$this->mahasiswa_model->getallmahasiswa();
        
        if($this->input->post('keyword'))
        //code...
            $data ['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
        

        $this->load->view('template/header',$data);
        $this->load->view('mahasiswa/index',$data);
        $this->load->view('template/footer');
        
    }
    public function tambah(){
        //$this->load->library('form_validation');
        $data['title']="FORM MENAMBAH DATA MAHASISWA";
        $data['jurusan']=['teknik informatika','teknik kimia','teknik industri','teknik mesin'];
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('nim','Nim','required|numeric');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('mahasiswa/tambah',$data);
            $this->load->view('template/footer');
        }
        else{
            $this->mahasiswa_model->tambahDataMhs();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('mahasiswa','refresh');
            
        } 
    }
    public function hapus($id){
        $this->load->model("mahasiswa_model");
        $this->mahasiswa_model->hapusdatamhs($id);
        $this->load->library('session');
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('mahasiswa','refresh');

    }
    public function detail($id){
        $data['title'] ='Detail Mahasiswa';
        $data['mahasiswa']=$this->mahasiswa_model->getmahasiswaByID($id);
        $this->load->view('template/header',$data);
        $this->load->view('mahasiswa/detail',$data);
        $this->load->view('template/footer');
    }
    public function edit($id){
        $data['title']="FORM EDIT DATA MAHASISWA";
        $data['mahasiswa']=$this->mahasiswa_model->getmahasiswaByID($id);
        $data['jurusan']=['teknik informatika','teknik kimia','teknik industri','teknik mesin'];
        
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('nim','Nim','required|numeric');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        
        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('mahasiswa/edit',$data);
            $this->load->view('template/footer');
        }
        else{
            $this->mahasiswa_model->ubahdatamhs();
            $this->session->set_flashdata('flash-data','diedit');
            redirect('mahasiswa','refresh');
            
        }
        
    }
    
}

/* End of file Home.php */
?>