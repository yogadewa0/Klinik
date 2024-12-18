<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    public function run()
    {
        // Data dummy detail_transaksi
        $data = [
            [
                'jumlah'       => 2,
                'kodeobat'     => 'A85',      // Referensi dari tabel obat
                'id_transaksi' => 'TRX001',   // Referensi dari tabel transaksi
            ],
            [
                'jumlah'       => 3,
                'kodeobat'     => 'B15',
                'id_transaksi' => 'TRX001',
            ],
            [
                'jumlah'       => 1,
                'kodeobat'     => 'A86',
                'id_transaksi' => 'TRX002',
            ],
            [
                'jumlah'       => 2,
                'kodeobat'     => 'B16',
                'id_transaksi' => 'TRX002',
            ],
            [
                'jumlah'       => 5,
                'kodeobat'     => 'B17',
                'id_transaksi' => 'TRX003',
            ],
            [
                'jumlah'       => 1,
                'kodeobat'     => 'A87',
                'id_transaksi' => 'TRX004',
            ],
            [
                'jumlah'       => 4,
                'kodeobat'     => 'B15',
                'id_transaksi' => 'TRX005',
            ],
        ];

        // Insert data ke tabel detail_transaksi
        $this->db->table('detail_transaksi')->insertBatch($data);
    }
}
