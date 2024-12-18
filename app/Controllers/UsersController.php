<?php

namespace App\Controllers;

use App\Models\ApiUserModel;

class UsersController extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new ApiUserModel();
    }

    public function login()
    {
        try {
            if ($this->request->getPost() != null) {
                $data = $this->request->getPost();
                $response = $this->usersModel->login($data);
    
                if (isset($response['user'])) {
                    // Store user data in session
                    session()->set('user', $response['user']);
                    return redirect()->to('dashboard'); // Adjust to your dashboard route
                } else {
                    return redirect()->back()->with('error', $response['message'] ?? 'Login failed.');
                }
            }
            return view('admin/login/SignUp');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Username atau password salah');
            return view('admin/login/SignUp');
        }
    }

    public function user($id_user = null)
    {
        $data['user'] = $this->usersModel->getUser($id_user);
        return view('admin/User/user_view', $data);
    }

    public function edit($id)
    {
        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost();
            $response = $this->usersModel->editUser($id, $data);
            return redirect()->to('/dashboard')->with('message', $response['message'] ?? 'Update failed.');
        }

        $user = $this->usersModel->getUser($id);
        return view('auth/edit', ['user' => $user]);
    }
}