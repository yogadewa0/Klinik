<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\ObatModel;

class ObatController extends BaseController
{
    // Show list of obat
    public function index(){
        $obatModel = new ObatModel();
        $data['obat'] = $obatModel->orderBy('kodeobat', 'DESC')->findAll();
        return view('admin/Obat/delete_obat', $data);
    }

    // Add obat form
    public function create(){
        return view('admin/Obat/add_obat');
    }

    // Insert data
    public function store() {
        $obatModel = new ObatModel();
        $data = [
            'kodeobat' => $this->request->getVar('kodeobat'),
            'namaobat'  => $this->request->getVar('namaobat'),
            'tanggalkadaluarsa' => $this->request->getVar('tanggalkadaluarsa'),
            'hargaobat'  => $this->request->getVar('hargaobat')
        ];
        $obatModel->insert($data);
        return $this->response->redirect(site_url('/obat-list'));
    }

    // Show single obat
    public function singleObat($id = null){
        $obatModel = new ObatModel();
        $data['obat_obj'] = $obatModel->where('kodeobat', $id)->first();
        return view('admin/Obat/edit_obat', $data);
    }

    // Update obat data
    public function update(){
        $obatModel = new ObatModel();
        $id = $this->request->getVar('kodeobat');
        $data = [
            'kodeobat' => $this->request->getVar('kodeobat'),
            'namaobat'  => $this->request->getVar('namaobat'),
            'tanggalkadaluarsa' => $this->request->getVar('tanggalkadaluarsa'),
            'hargaobat'  => $this->request->getVar('hargaobat')
        ];
        $obatModel->update($id, $data);
        return $this->response->redirect(site_url('/obat-list'));
    }

    // Delete obat
    public function delete($id = null){
        $obatModel = new ObatModel();
        $data['obat'] = $obatModel->where('kodeobat', $id)->delete($id);
        return $this->response->redirect(site_url('/obat-list'));
    }    
}
