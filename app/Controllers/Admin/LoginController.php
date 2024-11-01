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
            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
        }
    }

}
