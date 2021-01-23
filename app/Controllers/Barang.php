<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
	public function index()
	{	
		$a = new BarangModel();
		$data = [
			// 'dataBrg' => $a->findAll(),
			'dataBrg' => $a->paginate(5, 'brg_pages'),
			'pager' => $a->pager,
			'judul' => "Data Barang",
			
		];
		return view('barang', $data);
	}

	public function tambah()
	{
		session();
		$data = ['verror_msg' => \Config\Services::validation()];
		return view('barang/brg_tambah', $data);
	}

	public function simpan()
	{
		$aturan = $this->validate([
			'kode_barang' => [
				'label'	=> 'Kode Barang',
				'rules'	=> 'required|is_unique[barang.kode_barang]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} sudah dimasukan'
				]
			],
			'nama_barang' => [
				'label'	=> 'Nama barang',
				'rules'	=> 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			]
		]);

		if (!$aturan) {
			return redirect()->to('/barang/tambah')->withInput();
		}
		$a = new BarangModel();
		$a->insert([
			'kode_barang' => $this->request->getVar('kode_barang'),
			'nama_barang' => $this->request->getVar('nama_barang'),
			'merk' => $this->request->getVar('merk'),
			'jenis' => $this->request->getVar('jenis'),
			'unit' => $this->request->getVar('unit')
		]);

		return redirect()->to('../barang');
	}

	public function hapus($id)
	{
		$a = new BarangModel();
		$a->delete($id);
		return redirect()->to('../barang');
	}

	public function edit($id)
	{
		session();
		$data = ['verror_msg' => \Config\Services::validation()];
		$a = new BarangModel();
		$data['brg'][] = $a->find($id);
		return view('barang/brg_edit', $data);
	}

	public function proses_edit($id)
	{

		$aturan = $this->validate([
			'kode_barang' => [
				'label' => 'Kode Barang',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'nama_barang' => [
				'label' => 'Nama Barang',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			]
		]);

		if (!$aturan) {
			return redirect()->to('barang/edit/'.$id)->withInput();
		}

		$a= new BarangModel();
		$a->update($id, [
			'nama_barang' => $this->request->getVar('nama_barang'),
			'merk' => $this->request->getVar('merk'),
			'jenis' => $this->request->getVar('jenis'),
			'unit' => $this->request->getVar('unit')
		]);

		return redirect()->to('../barang');
	}
}
