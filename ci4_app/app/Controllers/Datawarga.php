<?php

namespace App\Controllers;

use \App\Models\WargaModel;
use CodeIgniter\Session\Session;


class Datawarga extends BaseController
{
	protected $wargaModel;
	public function __construct()
	{
		$this->wargaModel = new WargaModel();
	}
	public function index()
	{
		$warga = $this->wargaModel->findAll();

		$data = [
			'title' => 'Home',
			'warga' => $warga
		];

		return view('datawarga/datawarga', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Form Tambah Data Warga'
		];

		return view('datawarga/create', $data);
	}

	public function save()
	{
		// VALIDASI INPUT
		if (!$this->validate(
			[
				'nik' => 'required|is_unique[warga.nik]',
				'nama' => 'required',
				'alamat' => 'required',
				'no_rumah' => 'required'
			]
		)) {
			return redirect()->to('/datawarga/create');
		}

		// dd($this->request->getVar());
		$this->wargaModel->save([
			'nik' => $this->request->getVar('nik'),
			'nama' => $this->request->getVar('nama'),
			'kelamin' => $this->request->getVar('kelamin'),
			'alamat' => $this->request->getVar('alamat'),
			'no_rumah' => $this->request->getVar('no_rumah'),
			'status' => $this->request->getVar('status')

		]);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

		return redirect()->to('/');
	}

	public function delete($id)
	{
		$this->wargaModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus.');
		return redirect()->to('/');
	}

	public function edit($id)
	{

		$data = [
			'title' => "Form Ubah Data Warga",
			'DataWarga' => $this->wargaModel->find($id)
		];
		// dd($data);

		return view('datawarga/edit', $data);
	}

	public function update($id)
	{


		$this->wargaModel->save([
			'id' => $id,
			'nik' => $this->request->getVar('nik'),
			'nama' => $this->request->getVar('nama'),
			'kelamin' => $this->request->getVar('kelamin'),
			'alamat' => $this->request->getVar('alamat'),
			'no_rumah' => $this->request->getVar('no_rumah'),
			'status' => $this->request->getVar('status')

		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah.');

		return redirect()->to('/');
	}
}
