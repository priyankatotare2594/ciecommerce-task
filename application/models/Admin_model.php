<?php
class Admin_model extends CI_Model {

    function login($email,$pass){
        return $this->db->where('email',$email)
                        ->where('password',$pass)
                        ->get('admins')
                        ->row();
    }
}
