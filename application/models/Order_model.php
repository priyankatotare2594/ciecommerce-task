
<?php
class Order_model extends CI_Model {

   function createOrder()
{
    $user_id = 1;

    $cart = $this->db->where('user_id',$user_id)->get('carts')->result();

    if(!$cart) return false;

    $total = 0;

    foreach($cart as $c){
        $total += $c->qty * $c->price;
    }

    // insert order
    $this->db->insert('orders',[
        'user_id'=>$user_id,
        'total'=>$total
    ]);

    $order_id = $this->db->insert_id();

    // insert order items
    foreach($cart as $c){
        $this->db->insert('order_items',[
            'order_id'=>$order_id,
            'product_id'=>$c->product_id,
            'qty'=>$c->qty,
            'price'=>$c->price
        ]);
    }

    // clear cart
    $this->db->where('user_id',$user_id)->delete('carts');

    return true;
}

    // all orders
    function all(){
        return $this->db->get('orders')->result();
    }

    // single order
    function get($id){
        return $this->db->where('id',$id)->get('orders')->row();
    }

    // order items
    function items($order_id){
        return $this->db
            ->select('order_items.*, products.name, products.price')
            ->join('products','products.id = order_items.product_id')
            ->where('order_id',$order_id)
            ->get('order_items')
            ->result();
    }
}
?>
