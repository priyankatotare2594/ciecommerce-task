<?php
class Auth extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Admin_model','admin');
    }

    function login(){

        if($this->input->post()){

            $email = $this->input->post('email');
            $pass  = md5($this->input->post('password'));

            $user = $this->admin->login($email,$pass);

            if($user){
                $this->session->set_userdata('admin',$user->id);
                redirect('admin/orders');
            }else{
                $data['error']="Invalid login";
            }
        }

        $this->load->view('admin/login',$data ?? []);
    }

    function logout(){
        $this->session->unset_userdata('admin');
        redirect('admin/auth/login');
    }
}
