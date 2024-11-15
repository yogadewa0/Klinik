<?php 
namespace App\Models;
use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'alamat', 'notelpon', 'tanggal_lahir', 'jeniskelamin', 'golongan_darah', 'alergi'];
}
