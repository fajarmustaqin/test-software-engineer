<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_invoice', 'invoice');
    }

    public function index()
    {
        $data['title'] = 'Items';
        $data['item'] = $this->invoice->getItems();
        $this->load->view('template/header', $data);
        $this->load->view('items', $data);
        $this->load->view('template/footer');
    }
}