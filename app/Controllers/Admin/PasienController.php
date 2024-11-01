<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PasienModel;

class PasienController extends BaseController
{
    // show users list
    public function index(){
        
        $userModel = new PasienModel();
        $data['pasien'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('admin/Pasien/delete_pasien', $data);
    }

    // add user form
    public function create(){
        return view('admin/Pasien/add_pasien');
    }
 
    // insert data
    public function store() {
        $userModel = new PasienModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'alamat'  => $this->request->getVar('alamat'),
            'notelpon' => $this->request->getVar('notelpon'),
            'usia'  => $this->request->getVar('usia'),
            'jeniskelamin' => $this->request->getVar('jeniskelamin')  
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }

    // show single user
    public function singleUser($id = null){
        $userModel = new PasienModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('admin/Pasien/edit_pasien', $data);
    }

    // update user data
    public function update(){
        $userModel = new PasienModel();
        $id = $this->request->getVar('id');
        $data = [
            'nama' => $this->request->getVar('nama'),
            'alamat'  => $this->request->getVar('alamat'),
            'notelpon' => $this->request->getVar('notelpon'),
            'usia'  => $this->request->getVar('usia'),
            'jeniskelamin' => $this->request->getVar('jeniskelamin') 
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new PasienModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }    
}