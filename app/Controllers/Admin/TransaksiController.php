<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class TransaksiController extends BaseController
{
    // Show transaction list
    public function index(){
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->orderBy('tgl_transaksi', 'DESC')->findAll();
        return view('admin/Transaksi/all_transaksi', $data);
    }

    // Add transaction form
    public function create(){
        return view('admin/Transaksi/add_transaksi');
    }

    // Save new transaction 
    public function store(){
        $transaksiModel = new TransaksiModel();
        $data = [
            'id_transaksi' => $this->request->getVar('id_transaksi'),
            'tgl_transaksi'  => $this->request->getVar('tgl_transaksi'),
            'biaya_periksa'       => $this->request->getVar('biaya_periksa'),
            'id_pasien'      => $this->request->getVar('id_pasien'),
            'id_user'        => $this->request->getVar('id_user'),
        ];
        $transaksiModel->insert($data);
        return $this->response->redirect(site_url('/transaksi-list'));
    }
}