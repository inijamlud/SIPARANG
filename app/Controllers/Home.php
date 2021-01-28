<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PeminjamModel;
use App\Models\PinjamModel;

class Home extends BaseController
{
	public function index()
	{
		$brgModel = new BarangModel();
		$pmjModel = new PeminjamModel();
		$pinjam = new PinjamModel();
		$data = [
			'brg' => $brgModel->countAll(),
			'akun' => $pmjModel->countAll(),
			'peminjaman' => $pinjam->countAll(),
			'pengembalian' => $pinjam->pmbCountAll(),
			'judul' => "Dashboard",
		];

		if ($this->cek_admin() == true) {
			return redirect()->to('/admin');
		}

		return view('dashboard', $data);
	}
}
