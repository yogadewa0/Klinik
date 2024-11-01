<?php 
namespace App\Models;
use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'akun';
    
    protected $allowedFields = ['role', 'username','password'];
}