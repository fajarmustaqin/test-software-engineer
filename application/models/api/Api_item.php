<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api_item extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_item($id = "")
    {
        $return['status'] = 0;
        $return['data']   = [];

        $this->db->select("*");
        $this->db->from("ref_item");

        if ($id != '') {
            $this->db->where('id', $id);
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