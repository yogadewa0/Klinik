<?php 
namespace App\Models;

use CodeIgniter\Model;

class RekamMedisModel extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rekam_medis';
    protected $allowedFields = ['id_rekam_medis', 'id_pasien', 'tgl_kunjungan', 'diagnosa', 'penanganan', 'id_user'];

}
