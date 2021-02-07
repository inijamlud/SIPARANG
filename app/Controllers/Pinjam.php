<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PeminjamModel;
use App\Models\PinjamModel;


class Pinjam extends BaseController
{
	public function index()
	{
		$a = new PinjamModel();

		$data = [
			'dataTransaksi' => $a->peminjaman(),
			'judul' => "Data peminjaman"
		];
		return view('pinjam', $data);
	}

	public function tambah()
	{
		session();
		$brg = new BarangModel();
		$data = [
			'verror_msg' => \Config\Services::validation(),
			'dataBrg' => $brg->findAll()
		];
		return view('pinjam/pinjam_tambah', $data);
	}

	public function simpan()
	{
		$aturan = $this->validate([
			'nama_barang' => [
				'label'	=> 'Nama Barang',
				'rules'	=> 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'tgl_kembali' => [
				'label'	=> 'Tanggal Kembali',
				'rules'	=> 'required',
				'errors' => [
					'required' => '{field} perlu diisi'
				]
			]
		]);

		if (!$aturan) {
			return redirect()->to('/pinjam/tambah')->withInput();
		}

		$a = new PinjamModel();
		$brg = new BarangModel();

		$kode_barang = $this->request->getVar('nama_barang');
		$jml = $this->request->getVar('jumlah');
		$stock = $brg->checkStock($kode_barang);

		if ($jml > $stock) {
			session()->setFlashData('stock', 'jumlah melebihi unit yang ada');
			return redirect()->to('/pinjam/tambah')->withInput();
		} elseif ($jml == 0 || $jml == null) {
			session()->setFlashData('stock', 'jumlah barang tidak boleh kosong');
			return redirect()->to('/pinjam/tambah')->withInput();
		}

		// dd($stock);
		$brg->update($kode_barang, [
			'unit' => $stock - $jml
		]);

		$a->insert([
			'id_user' => $this->request->getVar('id'),
			'tgl_pinjam' => date('Y-m-d'),
			'tgl_kembali' => $this->request->getVar('tgl_kembali'),
			'kode_barang' => $kode_barang,
			'tujuan' => $this->request->getVar('tujuan'),
			'jumlah' => $jml
		]);

		return redirect()->to('../pinjam');
	}

	public function hapus($id)
	{
		$a = new PinjamModel();
		$a->delete($id);
		return redirect()->to('../pinjam');
	}

	public function edit($id)
	{
		session();
		$data = ['verror_msg' => \Config\Services::validation()];
		$a = new PinjamModel();
		$data['pinjam'][] = $a->find($id);
		return view('pinjam/trans_edit', $data);
	}

	public function proses_edit($id)
	{
		$aturan = $this->validate([
			'name' => [
				'label'	=> 'Nama Peminjam',
				'rules'	=> 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'email' => [
				'label'	=> 'Email',
				'rules'	=> 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
				]
			],
			'username' => [
				'label'	=> 'Username',
				'rules'	=> 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'password' => [
				'label'	=> 'password',
				'rules'	=> 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			]
		]);

		if (!$aturan) {
			return redirect()->to('/pinjam/edit/' . $id)->withInput();
		}

		$a = new PinjamModel();
		$password = $this->request->getVar('password');
		$a->update($id, [
			'email' => $this->request->getVar('email'),
			'name' => $this->request->getVar('name'),
			'username' => $this->request->getVar('username'),
			'password_hash' =>  password_hash(
				base64_encode(
					hash('sha384', $password, true)
				),
				PASSWORD_DEFAULT
			)

		]);

		return redirect()->to('../pinjam');
	}

	public function pinjam_kembali($id)
	{
		$pinjam = new PinjamModel();
		$barang = new BarangModel();

		$kode_barang = $this->request->getVar('kode_barang');
		$jml = $this->request->getVar('jumlah');
		$stock = $barang->checkStock($kode_barang);

		$barang->update($kode_barang, [
			'unit' => $stock + $jml
		]);

		$pinjam->update($id, [
			'status' => '2'
		]);

		return redirect()->to('../pinjam');
	}

	public function lappmj()
	{
		$pmj = new PinjamModel();

		$data['lappmj'] = $pmj->userPmj();
		return view('peminjaman', $data);
	}

	public function lappmb()
	{
		$pmj = new PinjamModel();

		$data['lappmj'] = $pmj->pengembalian();
		return view('pengembalian', $data);
	}
}
