<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LaporanPengeluaranController extends BaseController
{
    public function index()
    {
        // Load view laporan pengeluaran
        return view('admin/LaporanKeuangan/pengeluaran');
    }

    public function fetchData()
    {
        $db = \Config\Database::connect();

        // Ambil rentang tanggal dari request POST
        $from = $this->request->getPost('from');
        $to   = $this->request->getPost('to');

        // Query untuk laporan pengeluaran
        $builder = $db->table('detail_transaksi dt');
        $builder->select("
            DATE(t.tgl_transaksi) AS tanggal, 
            COUNT(DISTINCT dt.kodeobat) AS jumlah_pembelian_obat, 
            SUM(dt.jumlah * CAST(REPLACE(REPLACE(o.hargaobat, 'Rp', ''), '.', '') AS UNSIGNED)) AS total_pengeluaran
        ");
        $builder->join('transaksi t', 't.id_transaksi = dt.id_transaksi');
        $builder->join('obat o', 'o.kodeobat = dt.kodeobat');
        $builder->where('t.tgl_transaksi >=', $from);
        $builder->where('t.tgl_transaksi <=', $to);
        $builder->groupBy('DATE(t.tgl_transaksi)');
        $builder->orderBy('DATE(t.tgl_transaksi)', 'DESC');

        $data = $builder->get()->getResultArray();

        // Return JSON response
        return $this->response->setJSON($data);
    }
}
