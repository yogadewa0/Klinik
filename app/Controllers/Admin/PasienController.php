<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PasienModel;

class PasienController extends BaseController
{
    // show users list
    public function index(){
        
        $userModel = new PasienModel();
        $data['pasien'] = $userModel->orderBy('id_pasien', 'DESC')->findAll();
        return view('admin/Pasien/delete_pasien', $data);
    }

    // add user form
    public function create(){
        return view('admin/Pasien/add_pasien');
    }
 
    
    public function store() {
        $userModel = new PasienModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'alamat'  => $this->request->getVar('alamat'),
            'notelpon' => $this->request->getVar('notelpon'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jeniskelamin' => $this->request->getVar('jeniskelamin'),
            'golongan_darah' => $this->request->getVar('golongan_darah'),
            'alergi' => $this->request->getVar('alergi')
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }
    
    // show single user
    public function singleUser($id_pasien = null){
        $userModel = new PasienModel();
        $data['user_obj'] = $userModel->where('id_pasien', $id_pasien)->first();
        return view('admin/Pasien/edit_pasien', $data);
    }

    public function update() {
        $userModel = new PasienModel();
        $id_pasien = $this->request->getVar('id_pasien');
        $data = [
            'nama' => $this->request->getVar('nama'),
            'alamat'  => $this->request->getVar('alamat'),
            'notelpon' => $this->request->getVar('notelpon'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jeniskelamin' => $this->request->getVar('jeniskelamin'),
            'golongan_darah' => $this->request->getVar('golongan_darah'),
            'alergi' => $this->request->getVar('alergi')
        ];
        $userModel->update($id_pasien, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
 
    // delete user
    public function delete($id_pasien = null){
        $userModel = new PasienModel();
        $data['user'] = $userModel->where('id_pasien', $id_pasien)->delete($id_pasien);
        return $this->response->redirect(site_url('/users-list'));
    }    
}