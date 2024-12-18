<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kodeobat'          => 'A85',
                'namaobat'          => 'Antasida',
                'tanggalkadaluarsa' => '2024-12-03 00:00:00',
                'hargaobat'         => 'Rp 100.000',
                'satuan'            => 'strip',
                'ukuran'            => '100 g',
            ],
            [
                'kodeobat'          => 'A86',
                'namaobat'          => 'Paracetamol',
                'tanggalkadaluarsa' => '2025-01-15 00:00:00',
                'hargaobat'         => 'Rp 50.000',
                'satuan'            => 'strip',
                'ukuran'            => '500 mg',
            ],
            [
                'kodeobat'          => 'B15',
                'namaobat'          => 'Ibuprofen',
                'tanggalkadaluarsa' => '2025-06-20 00:00:00',
                'hargaobat'         => 'Rp 80.000',
                'satuan'            => 'botol',
                'ukuran'            => '100 ml',
            ],
            [
                'kodeobat'          => 'B16',
                'namaobat'          => 'Amoxicillin',
                'tanggalkadaluarsa' => '2024-11-30 00:00:00',
                'hargaobat'         => 'Rp 150.000',
                'satuan'            => 'botol',
                'ukuran'            => '250 mg',
            ],
            [
                'kodeobat'          => 'A87',
                'namaobat'          => 'Vitamin C',
                'tanggalkadaluarsa' => '2026-01-01 00:00:00',
                'hargaobat'         => 'Rp 70.000',
                'satuan'            => 'strip',
                'ukuran'            => '500 mg',
            ],
            [
                'kodeobat'          => 'B17',
                'namaobat'          => 'Antibiotik',
                'tanggalkadaluarsa' => '2025-09-15 00:00:00',
                'hargaobat'         => 'Rp 200.000',
                'satuan'            => 'botol',
                'ukuran'            => '150 ml',
            ],
        ];

        // Insert data menggunakan query builder
        $this->db->table('obat')->insertBatch($data);
    }
}
