<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class PenggunaController extends BaseController
{
    // Show list of users
    public function index(){
        $penggunaModel = new PenggunaModel();
        $data['akun'] = $penggunaModel->orderBy('username', 'DESC')->findAll();
        return view('admin/kelolaAkun/delete_akun', $data);
    }

    // Add user form
    public function create(){
        return view('admin/kelolaAkun/add_akun');
    }

    // Insert data
    public function store() {
        $penggunaModel = new PenggunaModel();
        $data = [
            'role' => $this->request->getVar('role'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];
        $penggunaModel->insert($data);
        return $this->response->redirect(site_url('/akun-list'));
    }

    // Show single user
    public function singleUser($username = null){
        $penggunaModel = new PenggunaModel();
        $data['user_obj'] = $penggunaModel->where('username', $username)->first();
        return view('admin/Pengguna/edit_user', $data);
    }

    // Update user data
    public function update(){
        $penggunaModel = new PenggunaModel();
        $username = $this->request->getVar('username');
        $data = [
            'role' => $this->request->getVar('role'),
            'password' => $this->request->getVar('password')
        ];
        $penggunaModel->where('username', $username)->set($data)->update();
        return $this->response->redirect(site_url('/akun-list'));
    }

    // Delete user
    public function delete($username = null){
        $penggunaModel = new PenggunaModel();
        $penggunaModel->where('username', $username)->delete();
        return $this->response->redirect(site_url('/akun-list'));
    }    
}
?>
