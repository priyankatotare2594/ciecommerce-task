<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_api extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Product_model','product');
    }

  

    public function index()
    {
        $this->load->model('Product_model');

        $products = $this->Product_model->getAll();

        echo json_encode([
            "status" => true,
            "data" => $products
        ]);
    }
}
