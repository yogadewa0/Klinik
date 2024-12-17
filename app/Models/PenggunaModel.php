<?php 
namespace App\Models;
use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['role', 'username','password'];
}