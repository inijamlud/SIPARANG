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

    // admin func /////////////////////
    public function showAll()
    {
        return $this->db->table('peminjaman')
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')->get()->getResultArray();
    }

    public function peminjamanAll()
    {
        return $this->db->table('peminjaman')
            ->where('status !=', '0')
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')->get()->getResultArray();
    }

    public function pengembalianAll()
    {
        return $this->db->table('peminjaman')
            ->where('status', '2')
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')->get()->getResultArray();
    }

    public function pmjCountAll()
    {
        return $this->db->table('peminjaman')
            ->where('status !=', '3')
            ->countAll();
    }

    public function pmbCountAll()
    {
        return $this->db->table('peminjaman')
            ->where('status !=', '3')
            ->where('status', '2')
            ->countAll();
    }

    // user func /////////////////////

    public function peminjaman()
    {
        return $this->db->table('peminjaman')
            ->where('users.username', user()->username)
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')->get()->getResultArray();
    }

    public function pengembalian()
    {
        return $this->db->table('peminjaman')
            ->where('users.username', user()->username)
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')->get()->getResultArray();
    }
}
