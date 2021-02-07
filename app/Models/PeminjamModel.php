<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamModel extends Model
{
    protected $table    = 'users';
    protected $primaryKey = 'id';
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    
    protected $allowedFields  = ['id', 'username', 'email', 'password_hash', 'name', 'status'];
    protected $useTimestamps  = true;
    
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    
    public function search($cari)
    {
        return $this->table('users')
            ->like('username', $cari)
            ->orLike('email', $cari)
            ->orLike('name', $cari);
    }
}