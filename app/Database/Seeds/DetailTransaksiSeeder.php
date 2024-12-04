<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'jumlah' => '100000',
            'kode_obat' => '05012617005632'
        ];

        //Query tambah detail transaksi
        $this->db->query('INSERT INTO detail_transaksi(jumlah, kode_obat) VALUES(:jumlah:, :kode_obat:', $data);

        //Masukkan data ke tabel detail_transaksi
        $this->db->table('detail_transaksi')->insert($data);
    }
}
