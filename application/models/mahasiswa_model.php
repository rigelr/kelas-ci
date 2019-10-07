<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model {

    public function getallmahasiswa()
    {
        // https://www.codeigniter.com/user_guide/database/query_builder.html?highlight=query20builder
        // $query digunakan untuk menampung isi dari tabel mahasiswa
            //$query=$this->db->get('mahasiswa');
            return $this->db->get('mahasiswa')->result_array();

        // https://www.codeigniter.com/user_guide/database/result.html
        // untuk menampilkan isi dari query
            //return $query->result_array();
    }
    public function tambahDataMhs(){
        $data=[
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];
        $this->db->insert('mahasiswa', $data);
        redirect('mahasiswa','refresh');   
    }
    public function hapusdatamhs($id){
        $this->db->where('id',$id);
        $this->db->delete('mahasiswa');

    }
    public function getmahasiswaByID($id){
        return $this->db->get_where('mahasiswa',['id'=>$id])->row_array();
    }
    public function ubahdatamhs(){
        $data=[
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('mahasiswa',$data);
    } 
    public function cariDataMahasiswa(){
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}

/* End of file Controllername.php */
?>