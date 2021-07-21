<?php

namespace App\Controllers;

use \App\Models\WargaModel;
use \App\Models\IuranModel;
use CodeIgniter\Session\Session;

$session = session();

class Dataiuran extends BaseController
{
    protected $wargaModel;
    protected $iuranModel;
    public function __construct()
    {
        $this->wargaModel = new WargaModel();
        $this->iuranModel = new IuranModel();
    }

    public function create()
    {
        $builder = $this->db->table('warga');
        $builder->select('nik, nama');
        $query = $builder->get();

        $data = [
            'title' => 'Tambah Iuran',
            'warga' => $query->getResult(),
        ];

        // dd($data);

        return view('dataiuran/create', $data);
    }

    public function save()
    {

        $getNIK = $this->request->getVar('nik');

        // dd($req);
        $warga = $this->wargaModel->where('nik', $getNIK)->first();

        $getMonthYear = $this->request->getPost('bulan');
        $pecahMonthYear = explode('-', $getMonthYear);


        // dd($pecahMonthYear);

        if (!$warga) {
            session()->setFlashdata('pesanError', 'Data gagal ditambahkan.');
            return redirect()->to('/dataiuran');
        }

        // dd($this->request->getVar());

        $this->iuranModel->save([
            'keterangan' => $this->request->getVar('keterangan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'bulan' =>  $pecahMonthYear[1],
            'tahun' => $pecahMonthYear[0],
            'jumlah' => $this->request->getVar('jumlah'),
            'warga_id' => $warga['id']

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/dataiuran');
    }

    public function index()
    {
        $builder = $this->db->table('iuran');
        $builder->select('nama, nik, keterangan, tanggal, bulan, tahun, jumlah');
        $builder->join('warga', 'iuran.warga_id = warga.id');
        $query = $builder->get();

        $data = [
            'title' => 'Data Iuran',
            'iuran' => $query->getResult(),
        ];

        // dd($data);


        return view('dataiuran/dataiuran', $data);
    }
}
