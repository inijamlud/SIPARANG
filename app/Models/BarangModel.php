<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table    = 'barang';
    protected $primaryKey = 'kode_barang';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields  = ['kode_barang', 'nama_barang', 'merk', 'jenis', 'unit'];
    protected $useTimestamps  = true;

    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    public function checkStock($id)
    {
        return $this->db->table('barang')
            ->selectSum('unit')
            ->where('kode_barang', $id)
            ->get()->getRow()->unit;
    }

    public function search($cari)
    {
        return $this->table('barang')
            ->like('kode_barang', $cari)
            ->orLike('nama_barang', $cari)
            ->orLike('merk', $cari)
            ->orLike('jenis', $cari);
    }

    
}
