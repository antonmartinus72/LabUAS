<?php

namespace App\Controllers;

use \App\Models\WargaModel;
use \App\Models\IuranModel;
use CodeIgniter\Session\Session;

$session = session();

class Dataiuranbulanan extends BaseController
{
    protected $wargaModel;
    protected $iuranModel;
    public function __construct()
    {
        $this->wargaModel = new WargaModel();
        $this->iuranModel = new IuranModel();
    }

    public function index()
    {

        // query data

        $query_a = $this->db->query("SELECT id, nik, nama  FROM warga;");

        $data_a = $query_a->getResultArray();

        $query_b = $this->db->query("SELECT bulan, warga_id  FROM iuran;");

        $data_b = $query_b->getResultArray();

        $data_c = [];

        foreach ($data_a as $key => $i) {

            $data_c[$i['id']]['nama'] = $i['nama'];
            $data_c[$i['id']]['nik'] = $i['nik'];
            $data_c[$i['id']]['id'] = $i['id'];
            $dump = [];

            foreach ($data_b as $j) {
                $data_c[$i['id']]['bulan'] = $j['bulan'];


                if ($i['id'] == $j['warga_id']) {

                    array_push($dump, $j['bulan']);
                }
            }
            sort($dump);
            $data_c[$i['id']]['bulan'] = $dump;
        }


        $data = [
            'title' => 'Data Iuran Bulanan',
            'iuran' => $data_c,
        ];


        return view('dataiuran/dataiuranbulanan', $data);
    }
}
