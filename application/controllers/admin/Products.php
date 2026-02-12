<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('upload');
    }

    // =========================
    // PRODUCT LIST
    // =========================
    public function index()
    {
        $data['products'] = $this->Product_model->getAll();

        $this->load->view('admin/products/index', $data);
    }

    // =========================
    // CREATE PAGE
    // =========================
    public function create()
    {
        $this->load->view('admin/products/create');
    }

    // =========================
    // STORE PRODUCT + IMAGES
    // =========================
    public function store()
    {
        $data = [
            'name'  => $this->input->post('name'),
            'price' => $this->input->post('price')
        ];

        $this->db->insert('products', $data);
        $product_id = $this->db->insert_id();

        $files = $_FILES['images'];
        $count = count($files['name']);

        for($i=0; $i<$count; $i++)
        {
            if($files['name'][$i] != '')
            {
                $_FILES['file']['name']     = $files['name'][$i];
                $_FILES['file']['type']     = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error']    = $files['error'][$i];
                $_FILES['file']['size']     = $files['size'][$i];

                $config = [
                    'upload_path'   => FCPATH.'uploads/products/',
                    'allowed_types' => 'jpg|jpeg|png|webp',
                    'file_name'     => time().'_'.$i,
                    'max_size'      => 2048
                ];

                $this->upload->initialize($config);

                if($this->upload->do_upload('file'))
                {
                    $uploadData = $this->upload->data();

                    $this->db->insert('product_images', [
                        'product_id' => $product_id,
                        'image'      => $uploadData['file_name']
                    ]);
                }
            }
        }

        redirect('admin/products');
    }
    // EDIT PAGE
public function edit($id)
{
    $data['product'] = $this->db->where('id',$id)->get('products')->row();

    $data['images'] = $this->db
        ->where('product_id',$id)
        ->get('product_images')
        ->result();

    $this->load->view('admin/products/edit',$data);
}
public function update($id)
{
    $data = [
        'name'  => $this->input->post('name'),
        'price' => $this->input->post('price')
    ];

    $this->db->where('id',$id)->update('products',$data);

    redirect('admin/products');
}
public function delete($id)
{
    $this->db->where('id',$id)->delete('products');
    $this->db->where('product_id',$id)->delete('product_images');

    redirect('admin/products');
}

}
