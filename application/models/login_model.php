<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model{

    function login($username,$password){

        // var_dump($username);
        // var_dump($password);
        // die();
        $this->db->select('username,password,level');
        $this->db->from('user');
        $this->db->where('username',$username); //maksudnya adalah selama inputan user yang disimpan pada parameter $user sama dengan username
        $this->db->where('password',$password);
        $this->db->limit(1); //maksudnya data yg diambil cuma 1

        $query=$this->db->get();
        if($query->num_rows()==1) //jika data ditemukan
        {
            return $query->result();
        }else{
            return false;
        }
    }

    
}
