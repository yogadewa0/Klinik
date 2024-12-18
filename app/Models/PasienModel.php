<?php 
namespace App\Models;
use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';

    // Pastikan id_pasien dimasukkan ke dalam allowedFields
    protected $allowedFields = [
        'id_pasien', 
        'nama', 
        'alamat', 
        'notelpon', 
        'tanggal_lahir', 
        'jeniskelamin', 
        'golongan_darah', 
        'alergi'
    ];

    // Method untuk generate id_pasien dengan prefix
    public function generateId()
    {
        $builder = $this->builder();
        $builder->select('id_pasien');
        $builder->orderBy('id_pasien', 'DESC');
        $lastPasien = $builder->get(1)->getRowArray();

        // Ambil nomor terakhir dari ID
        if ($lastPasien) {
            $lastId = substr($lastPasien['id_pasien'], 1); // Hilangkan prefix 'P'
            $nextId = str_pad(intval($lastId) + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextId = '001'; // Jika belum ada data
        }

        return 'P' . $nextId; // Format: P001, P002, dst.
    }
}
