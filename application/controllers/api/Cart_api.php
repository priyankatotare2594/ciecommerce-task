<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_api extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Cart_model','cart');
    }

    // GET cart list
    public function index()
    {
        $data = $this->cart->getCart(1);

        echo json_encode([
            'status'=>true,
            'data'=>$data
        ]);
    }

    // POST add to cart
   function add()
    {
        $data = [
            'user_id' => 1,
            'product_id' => $this->input->get('product_id'),
            'qty' => $this->input->get('qty')
        ];

        $this->cart->addToCart($data);

        echo "Added to cart";
    }

    // update qty
    public function update($id)
    {
        $this->cart->updateQty($id,$this->input->post('qty'));
        echo "Updated";
    }

    // delete
   function delete(){
    $id = $this->input->post('id');
    $this->cart->deleteItem($id);

    echo "Deleted";
}

}
