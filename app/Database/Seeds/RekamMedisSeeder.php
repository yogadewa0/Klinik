<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RekamMedisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'tgl_kunjungan'=>'2024/10/10',
            'diagnosa' => 'Asam Lambung',
            'penanganan' => 'Mengurangi produksi asam lambung'
        ];
        
        //Query tambah Rekam Medis
        $this->db->query('INSERT INTO rekam_medis(tgl_kunjungan, diagnosa, penanganan) VALUES(:tgl_kunjungan:, :diagnosa:, :penanganan:', $data);

        //Masukkan data ke tabel rekam medis
        $this->db->table('rekam_medis')->insert($data);
    }
}
