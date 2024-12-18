<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\User_Model;

class LoginController extends BaseController
{
    public function index(): string
    {
        return view('admin/login/SignUp');
    }

    public function __construct()
    {
        helper('url');  // Load URL helper
        // session();       // Pastikan session aktif
    }

    
    public function authenticate()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $userModel = new User_Model();
    $user = $userModel->getUser($username, $password);

    if ($user) {
        // Set session
        session()->set('user_id', $user['id_user']);
        session()->set('username', $user['username']);

        // Redirect ke dashboard
        return redirect()->to('/dashboard');
    } else {
        session()->setFlashdata('error', 'Username atau password salah');
        return redirect()->to('/login');
    }
}


    
    public function logout()
    {
        session()->destroy(); // Hapus semua session
        return redirect()->to('/login'); // Arahkan ke halaman login
    }

}