<?php
class Cart_model extends CI_Model {


    function addToCart($data)
    {
        return $this->db->insert('carts', $data);
    }



  function getCart($user_id)
{
    return $this->db
        ->select('carts.*, products.name, products.price')
        ->from('carts')
        ->join('products','products.id = carts.product_id','left')
        ->where('carts.user_id',$user_id)
        ->get()
        ->result();
}



    
    function updateQty($id,$qty)
    {
        return $this->db
            ->where('id',$id)
            ->update('carts',['qty'=>$qty]);
    }


    function deleteItem($id)
    {
        return $this->db
            ->where('id',$id)
            ->delete('carts');
    }



    function clearCart($user_id)
    {
        return $this->db
            ->where('user_id',$user_id)
            ->delete('carts');
    }
}
