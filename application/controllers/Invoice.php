<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_invoice', 'invoice');
    }

    public function index()
    {
        $data['title'] = 'Data invoice';
        $data['invoice'] = $this->invoice->getInvoice();

        $this->load->view('template/header', $data);
        $this->load->view('invoice', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Add invoice';
        $data['tanggal'] = date('Y-m-d');
        $data['items'] = $this->invoice->getItems();

        $this->load->view('template/header', $data);
        $this->load->view('form_invoice', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Update Invoice';
        $data['invoice'] = $this->invoice->getDataInvoice($id);

        $this->load->view('template/header', $data);
        $this->load->view('update_invoice', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $params = $this->input->post();

        $result = $this->invoice->edit($params);

        responseJson($result['status'], $result);
    }

    public function simpan()
    {
        $params = $this->input->post(null, true);
        $result = $this->invoice->simpan($params);

        responseJson($result['status'], $result);
    }

    public function detail($params)
    {
        $data['title'] = 'Detail invoice';
        $data['tanggal'] = date('Y-m-d');
        $data['invoice'] = $this->invoice->getDataInvoice($params);
        $data['items'] = $this->invoice->getItemDetail($params);
        $data['total'] = $this->invoice->total($params);

        $this->load->view('template/header', $data);
        $this->load->view('detail', $data);
        $this->load->view('template/footer');
    }

    public function hapus()
    {
        $input = $this->input->post();
        $result = $this->invoice->hapus($input['n_invoice']);
        
        if($result == 200){
            return successResponseJson('Proses berhasil');
        }else{
            return internalServerErrorResponseJson('Hapus gagal');
        }

        redirect('invoice');
    }
}