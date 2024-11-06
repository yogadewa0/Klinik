<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index(): string
    {
        return view('admin/login/SignUp');
    }

    public function __construct()
    {
        helper('url'); // Load the URL helper
    }
    
    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUser($username, $password);

        if ($user) {
            return redirect()->to('/dashboard');
        } else {
            // Set flash message for error
            session()->setFlashdata('error', 'Username atau password salah');
            return view('admin/login/SignUp');
            // return redirect()->back()->withInput();
            // return redirect()->to('/SignUp');
            // return back()->to('admin/login/SignUp');
        }
    }
}