<?php
class Cart extends CI_Controller {

    // ADD TO CART
   public function add()
    {
        $product_id = $this->input->post('product_id');
        $qty = $this->input->post('qty');

        $data = [
            'user_id' => 1, // hardcoded
            'product_id' => $product_id,
            'qty' => $qty
        ];

        $this->db->insert('carts', $data);

        echo json_encode([
            "status" => true,
            "message" => "Added to cart"
        ]);
    }

    // LIST CART
   public function list()
{
    $this->db->select('carts.*, products.name, products.price');
    $this->db->join('products', 'products.id = carts.product_id');

    $items = $this->db->get_where('carts', ['user_id'=>1])->result();

    $total = 0;

    foreach($items as $i){
        $total += $i->price * $i->qty;
    }

    echo json_encode([
        "status" => true,
        "items" => $items,
        "total" => $total
    ]);
}
public function update()
{
    $id = $this->input->post('cart_id');
    $qty = $this->input->post('qty');

    $this->db->where('id', $id)->update('carts', ['qty'=>$qty]);

    echo json_encode(["status"=>true]);
}

    // DELETE
    public function delete($id)
{
    $this->db->delete('carts', ['id'=>$id]);

    echo json_encode(["status"=>true]);
}

}
