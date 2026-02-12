<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_api extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Cart_model','cart');
        $this->load->model('Order_model','order');
    }

    public function index()
    {
        $user_id = 1;

        // create order
        $this->order->createOrder($user_id);

        echo json_encode([
            'status' => true,
            'message' => 'Order placed successfully'
        ]);
    }
}
