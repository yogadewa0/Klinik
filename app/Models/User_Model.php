<?php 
namespace App\Models;
use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'id_user',
        'role',
        'username',
        'password',
        'nama',
        'alamat',
        'no_telp'
    ];

    // Method untuk generate id_user dengan prefix 'U'
    public function generateId()
    {
        $builder = $this->builder();
        $builder->select('id_user');
        $builder->orderBy('id_user', 'DESC');
        $lastUser = $builder->get(1)->getRowArray();

        // Ambil nomor terakhir dari ID
        if ($lastUser) {
            $lastId = substr($lastUser['id_user'], 1); // Hilangkan prefix 'U'
            $nextId = str_pad(intval($lastId) + 1, 3, '0', STR_PAD_LEFT); // Increment ID
        } else {
            $nextId = '001'; // Jika belum ada data, mulai dari '001'
        }

        return 'U' . $nextId; // Format: U001, U002, dst.
    }
}
