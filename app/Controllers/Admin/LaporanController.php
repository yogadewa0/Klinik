<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class LaporanController extends BaseController
{
    public function index(): string
    {
        return view('admin/laporanKeuangan/pendapatan');
    }

    public function pengeluaran():string 
    {
        return view('admin/laporanKeuangan/pengeluaran');
    }
}