<?php 
namespace App\Models;

use CodeIgniter\Model;

class RekamMedisModel extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rekam_medis';

    protected $allowedFields = [
        'id_rekam_medis', 
        'id_pasien', 
        'tgl_kunjungan', 
        'diagnosa', 
        'penanganan', 
        'id_user'
    ];

    // Method untuk generate id_rekam_medis dengan prefix
    public function generateId()
    {
        $builder = $this->builder();
        $builder->select('id_rekam_medis');
        $builder->orderBy('id_rekam_medis', 'DESC');
        $lastRekamMedis = $builder->get(1)->getRowArray();

        // Ambil nomor terakhir dari ID
        if ($lastRekamMedis) {
            $lastId = substr($lastRekamMedis['id_rekam_medis'], 2); // Hilangkan prefix 'RM'
            $nextId = str_pad(intval($lastId) + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextId = '001'; // Jika belum ada data
        }

        return 'RM' . $nextId; // Format: RM001, RM002, dst.
    }
}

