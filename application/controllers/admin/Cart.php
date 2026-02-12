<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Cart_model','cart');
    }

   public function index()
    {
        $this->db->select('carts.*, products.name, products.price');
        $this->db->join('products','products.id=carts.product_id');

        $data['items'] = $this->db->get_where('carts',['user_id'=>1])->result();

        $this->load->view('admin/cart/index', $data);
    }
    
}

