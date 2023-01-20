<?php

function getNoLast($column, $tabel)
{
	$ci = &get_instance();
	$ci->db->select([$column]);
	$ci->db->order_by($column, "DESC");
	$data = $ci->db->get($tabel)->row_array();
	return $data;
}

function generateInvoice($prefix, $column, $table)
{
	$last = getNoLast($column, $table);
	$akhir = 0;
	if (!empty($last)) {
		$akhir = intval(str_replace($prefix, "", $last[$column]));
	}
	$pad = 6;
	$new_code = str_pad(($akhir + 1), $pad, "0", STR_PAD_LEFT);
	return $prefix . $new_code;
}


function responseJson($status, $response)
{
    $_this = &get_instance();
    return $_this->output
        ->set_content_type('application/json')
        ->set_status_header($status)
        ->set_output(json_encode($response));
}

function createdResponseJson($message, $data = null)
{
    $response =  [
        "message"   => [
            "title" => "Sukses",
            "body"  => $message
        ]
    ];

    if ($data != null) {
        $response['data'] = $data;
    }

    return responseJson(201, $response);
}

function successResponseJson($message, $data = null)
{
    $response =  [
        "message"   => [
            "title" => "Sukses",
            "body"  => $message
        ]
    ];

    if ($data != null) {
        $response['data'] = $data;
    }

    return responseJson(200, $response);
}

function forbiddenResponseJson($message = null)
{
    if ($message == null) {
        $message = "Anda tidak memiliki hak akses.";
    }
    $response = [
        "message"   => [
            "title" => "Error",
            "body"  => $message
        ]
    ];

    return responseJson(403, $response);
}

function notFoundResponseJson($message = null)
{
    if ($message == null) {
        $message = "Data tidak ditemukan";
    }
    $response = [
        "message"   => [
            "title" => "Error",
            "body"  => $message
        ]
    ];

    return responseJson(404, $response);
}

function methodNotAllowedResponseJson($message = null)
{
    if ($message == null) {
        $message = "Metode HTTP Request tidak diijinkan server.";
    }
    $response = [
        "message"   => [
            "title" => "Error",
            "body"  => $message
        ]
    ];

    return responseJson(405, $response);
}

function badRequestsResponseJson($message = null)
{
    if ($message == null) {
        $message = "Format HTTP Request salah.";
    }
    $response = [
        "message"   => [
            "title" => "Error",
            "body"  => $message
        ]
    ];

    return responseJson(400, $response);
}

function internalServerErrorResponseJson($message = null, $data = null)
{
    if ($message == null) {
        $message = "Terjadi kesalahan server. Silahkan menghubungi bagian IT.";
    }

    $response =  [
        "message"   => [
            "title" => "Error",
            "body"  => $message
        ]
    ];

    if ($data != null) {
        $response['data'] = $data;
    }

    return responseJson(500, $response);
}
