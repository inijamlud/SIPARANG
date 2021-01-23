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
		$pmjModel = new PinjamModel();
		$data = [
			'brg' => $brgModel->countAll(),
			'akun' => $pmjModel->countAll(),
			'peminjaman' => $pmjModel->countAll(),
			'pengembalian' => $pmjModel->pengembalianShowAll(),
			'judul' => "Dashboard",
		];

		if ($this->cek_admin() == true) {
			return redirect()->to('/admin');
		}

		return view('dashboard', $data);
	}
}
