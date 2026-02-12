<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('admin')){
            redirect('admin/auth/login');
        }

        $this->load->model('Order_model','order');
    }

    // Order list
    function index(){

        $data['orders'] = $this->order->all();

        $this->load->view('admin/template/header');
        $this->load->view('admin/orders/list',$data);
        $this->load->view('admin/template/footer');
    }

    // Order view page
    function view($id){

        $data['order'] = $this->order->get($id);
        $data['items'] = $this->order->items($id);

        $this->load->view('admin/template/header');
        $this->load->view('admin/orders/view',$data);
        $this->load->view('admin/template/footer');
    }
}
