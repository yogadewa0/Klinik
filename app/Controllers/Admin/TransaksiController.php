<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class TransaksiController extends BaseController
{
    // show transaction list
    public function index(){
        
        $TransaksiModel = new TransaksiModel();
        $data['transaksi'] = $TransaksiModel->orderBy('tgl_transaksi', 'DESC')->findAll();
        return view('admin/Transaksi/all_transaksi', $data);
    }

    // add transaction form
    public function create(){
        return view('admin/Transaksi/add_transaksi');
    }
 
    // save new transaction 
    public function store() {
        $TransaksiModel = new TransaksiModel();
        $data = [
            'id_transaksi' => $this->request->getVar('id_transaksi'),
            'tgl_transaksi'  => $this->request->getVar('tgl_transaksi'),
            'biaya_periksa' => $this->request->getVar('biaya_periksa'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'id_user' => $this->request->getVar('id_user')
        ];
        $TransaksiModel->insert($data);
        return $this->response->redirect(site_url('/transaksi-list'));
    }
}