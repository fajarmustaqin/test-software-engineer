<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_invoice extends CI_Model{

    public function getInvoice()
    {
        $this->db->select('*');
        $data = $this->db->get('h_invoice')->result();

        return $data;
    }

    public function getItems()
    {
        $this->db->select('id, tipe_item, deskripsi, harga');
        $data = $this->db->get('ref_item')->result();

        return $data;
    }

    public function hapus($n_invoice)
    {
        $this->db->where('n_invoice', $n_invoice);
        $this->db->delete('h_invoice');

        $this->db->where('id_invoice', $n_invoice);
        $this->db->delete('d_invoice');

        return $return = 200;
    }

    public function edit($params)
    {
        $return['status']  = 0;
        $return['message'] = '';

        $data['nama_pengirim'] = $params['nama_pengirim'];
        $data['alamat_pengirim'] = $params['alamat_pengirim'];
        $data['nama_penerima'] = $params['nama_penerima'];
        $data['alamat_penerima'] = $params['alamat_penerima'];
        $data['keterangan'] = $params['keterangan'];
        $data['tanggal'] = $params['tanggal'];
        $data['tempo'] = $params['tempo'];
        
        $this->db->trans_start();
        $this->db->where('n_invoice', $params['n_invoice']);
        $this->db->update('h_invoice', $data);        
        
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $return['status']  = 500;
            $return['message'] = 'Data gagal diedit';
        } else {
            $this->db->trans_commit();
            $return['status']  = 201;
            $return['message'] = 'Data berhasil diedit';
        }
        $this->db->trans_complete();

        return $return;
    }

    public function simpan($params)
    {
        $return['status']  = 0;
        $return['message'] = '';

        $data['n_invoice'] = generateInvoice(PREFIX_INVOICE, 'n_invoice', 'h_invoice');
        $data['nama_pengirim'] = $params['nama_pengirim'];
        $data['alamat_pengirim'] = $params['alamat_pengirim'];
        $data['nama_penerima'] = $params['nama_penerima'];
        $data['alamat_penerima'] = $params['alamat_penerima'];
        $data['keterangan'] = $params['keterangan'];
        $data['tanggal'] = $params['tanggal'];
        $data['tempo'] = $params['tempo'];

        $item = $params['tipe_item'];
        $desc = $params['desc'];
        $price = array_map('intval', $params['harga']);
        $qty = array_map('intval', $params['jumlah']);

        
        $jml_baris = count($params['tipe_item']);
        
        $this->db->trans_start();
        
        $this->db->insert('h_invoice', $data);        
        
        for($i = 0; $i < $jml_baris; $i++){

            $jumlah_barang = $qty[$i];
            $harga_barang = $price[$i];
            
            $total = $jumlah_barang * $harga_barang;
            
            $object[$i] = [
                'id_invoice' => $data['n_invoice'],
                'kode_item' => $item[$i],
                'jumlah_barang' => $qty[$i],
                'total' => $total
            ];
            $tes = $this->db->insert('d_invoice', $object[$i]);
        }
        // var_dump($object);die;

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $return['status']  = 500;
            $return['message'] = 'Data gagal ditambahkan';
        } else {
            $this->db->trans_commit();
            $return['status']  = 201;
            $return['message'] = 'Data berhasil ditambahkan';
        }
        $this->db->trans_complete();

        return $return;
    }

    public function getDataInvoice($id)
    {
        $this->db->select('n_invoice, nama_pengirim, alamat_pengirim, nama_penerima, alamat_penerima, keterangan, tanggal, tempo');
        $this->db->where('n_invoice', $id);
        
        return $this->db->get('h_invoice')->row_array();
    }

    public function getItemDetail($id)
    {
        $this->db->select('b.tipe_item, b.deskripsi, a.jumlah_barang, b.harga, a.total');
        $this->db->where('id_invoice', $id);
        $this->db->join('ref_item b','b.id = a.kode_item', 'left');
        $result = $this->db->get('d_invoice a');

        return $result->result();
    }

    public function total($id)
    {
        $this->db->select('SUM(total) as subtotal');
        $this->db->where('id_invoice', $id);
        $result = $this->db->get('d_invoice')->row_array();

        return $result;
    }
}