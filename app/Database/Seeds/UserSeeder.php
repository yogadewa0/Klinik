<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user'   => 'U001',
                'role'      => 'admin',
                'username'  => 'admin1',
                'password'  => password_hash('password123', PASSWORD_DEFAULT), // Hash password
                'nama'      => 'Admin Utama',
                'alamat'    => 'Jl. Sudirman No. 1',
                'no_telp'   => '081234567890',
            ],
            [
                'id_user'   => 'U002',
                'role'      => 'dokter',
                'username'  => 'dokter1',
                'password'  => password_hash('password123', PASSWORD_DEFAULT),
                'nama'      => 'Dokter Andi',
                'alamat'    => 'Jl. Ahmad Yani No. 2',
                'no_telp'   => '081234567891',
            ],
            [
                'id_user'   => 'U003',
                'role'      => 'mantri',
                'username'  => 'mantri1',
                'password'  => password_hash('password123', PASSWORD_DEFAULT),
                'nama'      => 'Mantri Budi',
                'alamat'    => 'Jl. Merpati No. 3',
                'no_telp'   => '081234567892',
            ],
        ];

        // Insert data menggunakan query builder
        $this->db->table('user')->insertBatch($data);
    }
}
