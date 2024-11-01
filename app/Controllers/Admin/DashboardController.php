<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index(): string
    {
        // $data = [
        //     'title' => 'Dashboard'
        // ];
        // $data = ['Dashboard'];
        return view('admin/dasboard/dashboard');
    }
    
    public function template(): string {
        // $header = [
        //     'title' => 'Dashboard'
        // ];
        return view('admin/Pasien/index');
    }
}