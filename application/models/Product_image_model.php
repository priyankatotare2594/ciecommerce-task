
<?php
class Product_image_model extends CI_Model {
 public function get_by_product($id){
  return $this->db->where('product_id',$id)->get('product_images')->result();
 }
 public function insert($data){
  $this->db->insert('product_images',$data);
 }
}
