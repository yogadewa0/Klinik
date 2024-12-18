<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\User_Model;

class UserController extends BaseController
{
    // Menampilkan halaman list user
    public function index() {
        $userModel = new User_Model();
    
        // Ambil semua data pengguna
        $data['user'] = $userModel->findAll();
    
        // Debugging untuk memastikan data ada
        // echo '<pre>'; print_r($data['user']); echo '</pre>'; die();
    
        // Kirim data ke view
        return view('admin/User/user_view', $data);
    }
    

    // Menampilkan form untuk menambahkan pengguna
    public function create() {
        return view('admin/User/add_user');
    }

    // Menyimpan data pengguna
    public function store() {
        $userModel = new User_Model();
    
        // Generate ID User
        $id_user = $userModel->generateId();
    
        // Simpan data ke database
        $data = [
            'id_user' => $id_user,
            'role' => $this->request->getVar('role'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp')
        ];
        $userModel->insert($data);
    
        // Redirect ke user-list
        return redirect()->to('/user-list');
    }    

    // Menampilkan profil pengguna
    public function profile($id = null) {
        $userModel = new User_Model();

        // Ambil data pengguna berdasarkan ID
        $data['user'] = $userModel->where('id_user', $id)->first();
    
        // Validasi jika data tidak ditemukan
        if (!$data['user']) {
            return redirect()->to('/user-list')->with('error', 'Data pengguna tidak ditemukan.');
        }
    
        // Kirim data ke view
        return view('admin/User/user_view', $data);
    }

    // Menampilkan form untuk mengedit data pengguna
    public function singleUser($id = null) {
        $userModel = new User_Model();
        $data['user_obj'] = $userModel->where('id_user', $id)->first();
        return view('admin/User/edit_user', $data);
    }

    // Mengupdate data pengguna
    public function update() {
        $userModel = new User_Model();
        $id = $this->request->getVar('id_user');
        $data = [
            'role'     => $this->request->getVar('role'),
            'username' => $this->request->getVar('username'),
            'nama'     => $this->request->getVar('nama'),
            'alamat'   => $this->request->getVar('alamat'),
            'no_telp'  => $this->request->getVar('no_telp')
        ];

        // Jika password diisi, update password
        if (!empty($this->request->getVar('password'))) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);
        return $this->response->redirect(site_url('user-list')); // Redirect setelah update
    }

    // Menghapus data pengguna
    public function delete($id = null) {
        $userModel = new User_Model();
        $userModel->where('id_user', $id)->delete($id);
        return $this->response->redirect(site_url('user-list')); // Redirect ke daftar pengguna setelah dihapus
    }
}

