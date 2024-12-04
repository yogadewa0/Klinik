<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'kode_obat' => '041260360725',
            'nama_obat' => 'Omeprazole',
            'tgl_kadaluarsa' => '2024/12/31',
            'satuan' => 'strip',
            'ukuran' => '14 kapsul (20 mg)',
            'harga_obat' => '10000'
        ];

        //Query tambah obat
        $this->db->query('INSERT INTO obat(nama_obat, tgl_kadaluarsa, satuan, ukuran, harga_obat) VALUES(:nama_obat:, :tgl_kadaluarsa:, :satuan:, :ukuran:, :harga_obat:)', $data);
        
        //Masukkan data ke tabel obat
        $this->db->table('obat')->insert($data);

    }
}
