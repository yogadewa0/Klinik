<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class TransaksiController extends BaseController
{
    // Show transaction list
    public function index(){
        $TransaksiModel = new TransaksiModel();
        $data['transaksi'] = $TransaksiModel->orderBy('tgl_transaksi', 'DESC')->findAll();
        return view('admin/Transaksi/all_transaksi', $data);
    }

    // Add transaction form
    public function create(){
        return view('admin/Transaksi/add_transaksi');
    }

    // Save new transaction 
    public function store() {
        // Validate input
        $validation = $this->validate([
            'nama_pasien' => 'required',
            'nama_user' => 'required',
            'tgl_transaksi' => 'required',
            'biaya_periksa' => 'required|numeric',
            'id_pasien' => 'required',
            'id_user' => 'required'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $TransaksiModel = new TransaksiModel();
        $data = [
            'tgl_transaksi'  => $this->request->getVar('tgl_transaksi'),
            'biaya_periksa' => $this->request->getVar('biaya_periksa'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'id_user' => $this->request->getVar('id_user')
        ];

        // Insert data and handle error
        if ($TransaksiModel->insert($data)) {
            return $this->response->redirect(site_url('/transaksi-list'));
        } else {
            return redirect()->back()->withInput()->with('msg', 'Gagal menyimpan transaksi.');
        }
    }
}