<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api_invoice extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getDetailInvoice($id = "")
    {
        $return['status'] = 0;
        $return['data']   = [];

        $this->db->select("b.n_invoice, b.nama_pengirim, b.alamat_pengirim, b.nama_penerima, b.alamat_penerima, b.tanggal, b.tempo, c.tipe_item, c.deskripsi, c.harga, a.jumlah_barang, a.total");
        $this->db->from("d_invoice a");
        $this->db->join('h_invoice b', 'b.n_invoice = a.id_invoice', 'left');
        $this->db->join('ref_item c', 'c.id = a.kode_item', 'left');

        if ($id != '') {
            $this->db->where('id_invoice', $id);
        }

        $get = $this->db->get();

        if ($get->num_rows() != 0) {

            $data = $get->result_object();
            

            $return['status'] = 201;
            $return['data']   = $data;
        } else {
            $return['status'] = 500;
            $return['data']   = [];
        }
        return $return;
    }

    public function getInvoice($id = "")
    {
        $return['status'] = 0;
        $return['data']   = [];

        $this->db->select("b.n_invoice, b.nama_pengirim, b.nama_penerima, b.tanggal, b.tempo, c.deskripsi, a.total");
        $this->db->from("d_invoice a");
        $this->db->join('h_invoice b', 'b.n_invoice = a.id_invoice', 'left');
        $this->db->join('ref_item c', 'c.id = a.kode_item', 'left');

        if ($id != '') {
            $this->db->where('id_invoice', $id);
        }

        $get = $this->db->get();

        if ($get->num_rows() != 0) {
            $data = [];
            if ($id != "") {
                $data = $get->row_object();
            } else {
                $data = $get->result_object();
            }

            $return['status'] = 201;
            $return['data']   = $data;
        } else {
            $return['status'] = 500;
            $return['data']   = [];
        }
        return $return;
    }
}