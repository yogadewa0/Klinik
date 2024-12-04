<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'tgl_transaksi' => '2024/11/26',
            'biaya_periksa' => '50000' 
        ];

        //Query tambah Transaksi
        $this->db->query('INSERT INTO transaksi(tgl_transaksi, biaya_periksa) VALUES(:tgl_transaksi:, :biaya_periksa:', $data);

        //Masukkan data ke tabel transaksi
        $this->db->table('transaksi')->insert($data);
    }
}
