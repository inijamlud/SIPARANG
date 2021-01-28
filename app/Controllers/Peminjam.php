<?php

namespace App\Controllers;

use App\Models\PeminjamModel;
use App\Models\PinjamModel;

class Peminjam extends BaseController
{

	public function tambah()
	{
		session();
		$data = ['verror_msg' => \Config\Services::validation()];
		return view('peminjam/peminjam_tambah', $data);
	}

	public function simpan()
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
				'rules'	=> 'required|is_unique[users.email]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} sudah dimasukan',
				]
			],
			'username' => [
				'label'	=> 'Username',
				'rules'	=> 'required|is_unique[users.username]',
				'errors' => [
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} sudah dimasukan',
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
			return redirect()->to('/peminjam/tambah')->withInput();
		}

		$a = new PeminjamModel();
		$password = $this->request->getVar('password');
		$a->insert([
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

		return redirect()->to('../peminjam');
	}

	public function hapus($id)
	{
		$a = new PeminjamModel();
		$a->delete($id);
		return redirect()->to('../peminjam');
	}

	public function edit($id)
	{
		session();
		$data = ['verror_msg' => \Config\Services::validation()];
		$a = new PeminjamModel();
		$data['peminjam'][] = $a->find($id);
		return view('peminjam/peminjam_edit', $data);
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
			return redirect()->to('/peminjam/edit/' . $id)->withInput();
		}

		$a = new PeminjamModel();
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

		return redirect()->to('../peminjam');
	}


	public function lappen()
	{
		$pmj = new PinjamModel();

		$data['lappemb'] = $pmj->pengembalianShowAll();
		return view('/admin/pengembalian', $data);
	}
}
