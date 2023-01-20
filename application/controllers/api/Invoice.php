<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Invoice extends REST_Controller
{


    private $ok = '200';
    private $bad = '400';
    private $unauthorized = '401';
    private $notfound = '404';
    private $error = '500';

    function __construct()
    {
        parent::__construct();
        $this->methods['data_post']['limit'] = 100; // 100 requests per hour per data/key
        $this->load->model('api/Api_invoice', 'invoice');
    }

    public function index_get($id='')
    {
        $id = $this->input->get('id');

        $current = $this->invoice->getDetailInvoice($id);

        if ($current['status'] == 201) {
            $this->response([
                'code'      => REST_Controller::HTTP_OK,
                'message'   => 'Detail Invoice ditemukan',
                'data'      => $current['data'],
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'code'      => REST_Controller::HTTP_NO_CONTENT,
                'message'   => 'Database Kosong',
                'data'      => [],
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }

    public function data_get($id='')
    {
        $id = $this->input->get('id');

        $current = $this->invoice->getInvoice($id);

        if ($current['status'] == 201) {
            $this->response([
                'code'      => REST_Controller::HTTP_OK,
                'message'   => 'Data Invoice ditemukan',
                'data'      => $current['data'],
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'code'      => REST_Controller::HTTP_NO_CONTENT,
                'message'   => 'Database Kosong',
                'data'      => [],
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }
}