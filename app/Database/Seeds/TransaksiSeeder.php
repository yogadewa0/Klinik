<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        // Data dummy transaksi
        $data = [
            [
                'id_transaksi'  => 'TRX001',
                'tgl_transaksi' => '2024-01-01 08:30:00',
                'biaya_periksa' => 150000,
                'id_pasien'     => 'P001',
                'id_user'       => 'U001',
            ],
            [
                'id_transaksi'  => 'TRX002',
                'tgl_transaksi' => '2024-01-02 10:00:00',
                'biaya_periksa' => 200000,
                'id_pasien'     => 'P002',
                'id_user'       => 'U002',
            ],
            [
                'id_transaksi'  => 'TRX003',
                'tgl_transaksi' => '2024-01-03 09:15:00',
                'biaya_periksa' => 175000,
                'id_pasien'     => 'P003',
                'id_user'       => 'U003',
            ],
            [
                'id_transaksi'  => 'TRX004',
                'tgl_transaksi' => '2024-01-04 11:45:00',
                'biaya_periksa' => 125000,
                'id_pasien'     => 'P001',
                'id_user'       => 'U002',
            ],
            [
                'id_transaksi'  => 'TRX005',
                'tgl_transaksi' => '2024-01-05 14:00:00',
                'biaya_periksa' => 220000,
                'id_pasien'     => 'P002',
                'id_user'       => 'U001',
            ],
        ];

        // Insert data menggunakan insertBatch
        $this->db->table('transaksi')->insertBatch($data);
    }
}
