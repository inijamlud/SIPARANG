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

    public function search($cari)
    {
        return $this->db->table('peminjaman')
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')
            ->where('users.username', user()->username)
            ->like('id_user', $cari)
            ->orLike('tgl_pinjam', $cari)
            ->orLike('tgl_kembali', $cari)
            ->orLike('kode_barang', $cari)
            ->orLike('jumlah', $cari);
    }

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
            ->where('status !=', '2')
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
            ->where('status !=', '0')
            ->countAllResults();
    }

    public function pmbCountAll()
    {
        return $this->db->table('peminjaman')
            ->where('status !=', '3')
            ->where('approved', '1')
            ->countAllResults();
    }

    // user func /////////////////////

    public function userPmjCount()
    {
        return $this->db->table('peminjaman')
            ->join('users', 'users.id = peminjaman.id_user')
            ->where('users.username', user()->username)
            ->countAllResults();
    }

    public function peminjaman()
    {
        return $this->db->table('peminjaman')
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')
            ->where('users.username', user()->username)
            ->get()->getResultArray();
        // return $this->select()
        // ->join('users', 'users.id = peminjaman.id_user')
        // ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')
        // ->where('users.username', user()->username)
        // ->paginate(5, 'pmj');
    }

    public function userPmj()
    {
        return $this->db->table('peminjaman')
            ->join('users', 'users.id = peminjaman.id_user')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')
            ->where('users.username', user()->username)
            ->where('status !=', '0')
            ->get()->getResultArray();
    }

    public function pengembalian()
    {
        return $this->db->table('peminjaman')
            ->where('users.username', user()->username)
            ->join('users', 'users.id = peminjaman.id_user')
            ->where('status', '2')
            ->where('approved', '1')
            ->join('barang', 'barang.kode_barang = peminjaman.kode_barang')->get()->getResultArray();
    }
}
