<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RekamMedisSeeder extends Seeder
{
    public function run()
    {
        // Data rekam medis dengan kolom lengkap
        $data = [
            [
                'id_rekam_medis' => 'RM001',
                'id_pasien'      => 'P001',
                'tgl_kunjungan'  => '2024-10-10',
                'diagnosa'       => 'Asam Lambung',
                'penanganan'     => 'Mengurangi produksi asam lambung',
                'id_user'        => 'U001',
            ],
            [
                'id_rekam_medis' => 'RM002',
                'id_pasien'      => 'P002',
                'tgl_kunjungan'  => '2024-10-11',
                'diagnosa'       => 'Demam Tinggi',
                'penanganan'     => 'Pemberian paracetamol 3x1 sehari',
                'id_user'        => 'U002',
            ],
            [
                'id_rekam_medis' => 'RM003',
                'id_pasien'      => 'P003',
                'tgl_kunjungan'  => '2024-10-12',
                'diagnosa'       => 'Tekanan Darah Tinggi',
                'penanganan'     => 'Diet rendah garam dan olahraga ringan',
                'id_user'        => 'U003',
            ]
        ];

        // Insert data menggunakan query builder
        $this->db->table('rekam_medis')->insertBatch($data);
    }
}
