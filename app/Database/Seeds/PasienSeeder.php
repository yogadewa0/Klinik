<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PasienSeeder extends Seeder
{
    public function run()
    {
        // Data dummy pasien
        $data = [
            [
                'id_pasien'       => 'P001',
                'nama'            => 'John Doe',
                'alamat'          => 'Jl. Merdeka No. 1',
                'notelpon'        => '081234567890',
                'tanggal_lahir'   => '1990-01-01 00:00:00',
                'jeniskelamin'    => 'Laki-laki',
                'golongan_darah'  => 'A',
                'alergi'          => 'Tidak ada',
            ],
            [
                'id_pasien'       => 'P002',
                'nama'            => 'Jane Smith',
                'alamat'          => 'Jl. Pahlawan No. 2',
                'notelpon'        => '081234567891',
                'tanggal_lahir'   => '1995-05-10 00:00:00',
                'jeniskelamin'    => 'Perempuan',
                'golongan_darah'  => 'B',
                'alergi'          => 'Debu',
            ],
            [
                'id_pasien'       => 'P003',
                'nama'            => 'Ali Rahman',
                'alamat'          => 'Jl. Harmoni No. 3',
                'notelpon'        => '081234567892',
                'tanggal_lahir'   => '1988-03-15 00:00:00',
                'jeniskelamin'    => 'Laki-laki',
                'golongan_darah'  => 'O',
                'alergi'          => 'Seafood',
            ],
            [
                'id_pasien'       => 'P004',
                'nama'            => 'Siti Aminah',
                'alamat'          => 'Jl. Kemuning No. 4',
                'notelpon'        => '081234567893',
                'tanggal_lahir'   => '1992-08-20 00:00:00',
                'jeniskelamin'    => 'Perempuan',
                'golongan_darah'  => 'AB',
                'alergi'          => 'Tidak ada',
            ],
        ];

        // Insert data menggunakan insertBatch
        $this->db->table('pasien')->insertBatch($data);
    }
}
