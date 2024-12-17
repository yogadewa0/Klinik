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
}