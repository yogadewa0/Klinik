<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailRekamMedisSeeder extends Seeder
{
    public function run()
    {
        // Data dummy detail_rekam_medis
        $data = [
            [
                'anjuran_mantri'   => 'Minum 3x1 sehari setelah makan',
                'kodeobat'         => 'A85',      // Referensi dari tabel obat
                'id_rekam_medis'   => 'RM001',    // Referensi dari tabel rekam_medis
            ],
            [
                'anjuran_mantri'   => 'Minum 2x1 sehari sebelum tidur',
                'kodeobat'         => 'B15',
                'id_rekam_medis'   => 'RM002',
            ],
            [
                'anjuran_mantri'   => 'Minum 3x1 sehari setelah makan',
                'kodeobat'         => 'B16',
                'id_rekam_medis'   => 'RM003',
            ],
            [
                'anjuran_mantri'   => 'Minum 1x1 sehari pagi hari',
                'kodeobat'         => 'A87',
                'id_rekam_medis'   => 'RM001',
            ],
            [
                'anjuran_mantri'   => 'Minum 3x2 sehari setelah makan',
                'kodeobat'         => 'B17',
                'id_rekam_medis'   => 'RM002',
            ],
        ];

        // Insert data ke tabel detail_rekam_medis
        $this->db->table('detail_rekam_medis')->insertBatch($data);
    }
}
