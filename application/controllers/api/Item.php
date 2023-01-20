<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Item extends REST_Controller
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
        $this->load->model('api/Api_item', 'item');
    }

    public function index_get($id='')
    {
        $id = $this->input->get('id');

        $current = $this->item->get_item($id);

        if ($current['status'] == 201) {
            $this->response([
                'code'      => REST_Controller::HTTP_OK,
                'message'   => 'Data typografi ditemukan',
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

    public function kabupaten_get($kode_provinsi = '')
    {
        $kabupaten = $this->referensi->getKabupaten($kode_provinsi);

        if ($kabupaten['status']== 201) {

            $this->response([
                'code'      => REST_Controller::HTTP_OK,
                'message'   => 'Berhasil Diambil',
                'data'      => $kabupaten['data'],
            ], REST_Controller::HTTP_OK);
            return;
        } else {
            $this->response([
                'code'      => REST_Controller::HTTP_NO_CONTENT,
                'message'   => 'Database Kosong',
                'data'      => null,
            ], REST_Controller::HTTP_NO_CONTENT);
            return;
        }
    }
}