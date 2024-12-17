<?php 
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_transaksi', 'tgl_transaksi', 'biaya_periksa', 'id_pasien', 'id_user'];

}
