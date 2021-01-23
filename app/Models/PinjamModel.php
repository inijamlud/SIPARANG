<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table    = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $allowedFields  = ['id_peminjaman', 'id_user', 'tgl_pinjam', 'tgl_kembali', 'kode_barang', 'jumlah', 'status', 'approved', 'tgl_approved', 'tujuan'];
    protected $useTimestamps  = true;

    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    public function showAll()
    {
        return $this->db->table('peminjaman')
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')->get()->getResultArray();
    }

    public function pengembalianShowAll()
    {
        return $this->db->table('peminjaman')
            ->where('status', '3')
            ->where('approved', '1')
            ->countAllResults();
    }


    public function peminjaman()
    {
        return $this->db->table('peminjaman')
            ->where('users.username', user()->username)
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')->get()->getResultArray();
    }
}
