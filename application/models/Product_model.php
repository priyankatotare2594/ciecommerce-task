<?php
class Product_model extends CI_Model {

    public function getAll()
    {
        $products = $this->db->get('products')->result();

        foreach ($products as $p)
        {
            $imgs = $this->db
                ->where('product_id', $p->id)
                ->get('product_images')
                ->result();

            $images = [];

            foreach ($imgs as $img) {
                $images[] = base_url('uploads/products/'.$img->image);
            }

            $p->images = $images;
        }

        return $products;
    }
}
