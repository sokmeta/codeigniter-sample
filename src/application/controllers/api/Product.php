<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->helper(array('url', 'form'));
    }

    public function create()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $insertData = array(
            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $result = $this->Product_model->insert_product($insertData);
        
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Product added successfully.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'There was a problem adding the product.'));
        }
    }
}
