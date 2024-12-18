<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class TransaksiController extends BaseController
{
    // Show transaction list
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('transaksi.id_transaksi, transaksi.tgl_transaksi, transaksi.biaya_periksa, 
                          pasien.nama AS nama_pasien, user.nama AS nama_user');
        $builder->join('pasien', 'pasien.id_pasien = transaksi.id_pasien');
        $builder->join('user', 'user.id_user = transaksi.id_user');
        $builder->orderBy('transaksi.tgl_transaksi', 'DESC');
        
        $query = $builder->get();
        $data['transaksi'] = $query->getResultArray();

        return view('admin/Transaksi/all_transaksi', $data);
    }

    // Add transaction form
    public function create()
    {
        return view('admin/Transaksi/add_transaksi');
    }

    // Save new transaction 
    public function store()
    {
        $transaksiModel = new TransaksiModel();
        $data = [
            'id_transaksi'   => $this->request->getVar('id_transaksi'),
            'tgl_transaksi'  => $this->request->getVar('tgl_transaksi'),
            'biaya_periksa'  => $this->request->getVar('biaya_periksa'),
            'id_pasien'      => $this->request->getVar('id_pasien'),
            'id_user'        => $this->request->getVar('id_user'),
        ];
        $transaksiModel->insert($data);

        return $this->response->redirect(site_url('/transaksi-list'));
    }
}
