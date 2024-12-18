<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LaporanPemasukanController extends BaseController
{
    public function index()
    {
        return view('admin/LaporanKeuangan/pendapatan'); // Load the view
    }

    // Fetch filtered data via AJAX
    public function fetchData()
    {
        $db = \Config\Database::connect();

        // Ambil rentang tanggal dari request AJAX
        $from = $this->request->getPost('from');
        $to   = $this->request->getPost('to');

        // Query untuk menghitung jumlah pasien dan total pemasukan
        $builder = $db->table('transaksi');
        $builder->select('DATE(tgl_transaksi) AS tanggal, COUNT(id_transaksi) AS jumlah_pasien, SUM(biaya_periksa) AS total_pemasukan');
        $builder->where('tgl_transaksi >=', $from);
        $builder->where('tgl_transaksi <=', $to);
        $builder->groupBy('DATE(tgl_transaksi)');
        $builder->orderBy('DATE(tgl_transaksi)', 'DESC');

        $data = $builder->get()->getResultArray();

        return $this->response->setJSON($data); // Return JSON response
    }
}
