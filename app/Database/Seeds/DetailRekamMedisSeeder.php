<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailRekamMedisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'anjuran_mantri' => '1 kapsul 1x sehari, sebelum makan',
            'kode_obat' => '041260360725'
        ];

        //Query tambah detail rekam medis
        $this->db->query('INSERT INTO detail_rekam_medis(anjuran_mantri, kode_obat) VALUES(:anjuran_mantri:, :kode_obat:', $data);

        //Masukkan data ke tabel detail_rekam_medis
        $this->db->table('detail_rekam_medis')->insert($data);
    }
}
