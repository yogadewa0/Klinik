<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'kodeobat';
    protected $allowedFields = ['kodeobat', 'namaobat', 'tanggalkadaluarsa', 'hargaobat'];
}
