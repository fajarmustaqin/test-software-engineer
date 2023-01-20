<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller{

    public function index()
    {
        $data['title'] = 'Items';
        
        $this->load->view('template/header', $data);
        $this->load->view('items', $data);
        $this->load->view('template/footer');
    }
}