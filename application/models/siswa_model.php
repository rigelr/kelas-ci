<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class siswa_model extends CI_Model {

    public function getallsiswa()
    {
            return $this->db->get('siswa')->result_array();
    }
    public function tambahDataSw(){
        $data= array(
            "id" => $this->input->post('id', true),
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "alamat" => $this->input->post('alamat', true)
        );
        $this->db->insert('siswa', $data);
        
        redirect('siswa','refresh');   
    }
    public function hapusdatasw($id){
        $this->db->where('id',$id);
        $this->db->delete('siswa');

    }
    public function getsiswaByID($id){
        return $this->db->get_where('siswa',['id'=>$id])->row_array();
    }
    public function ubahdatasw(){
        $data=[
            "id" => $this->input->post('id', true),
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "alamat" => $this->input->post('alamat', true)
        ];
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('siswa',$data);
    }
    
    public function cariDatasiswa(){
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('siswa')->result_array();
    }

}
/* End of file Controllername.php */
?>
