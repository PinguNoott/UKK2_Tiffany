<?php

namespace App\Models;

use CodeIgniter\Model;

class M_oke extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['harga', 'diskon', 'total_harga'];

    public function simpanDiskon($data)
    {
        return $this->insert($data);
    }
}


