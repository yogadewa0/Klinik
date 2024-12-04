<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'role' => 'Mantri',
            'username' => 'mantri',
            'password' => '1234',
            'nama' => 'Mino',
            'alamat' => 'Paingan',
            'no_telp' => '081256981001'
        ];

        //Query tambah user
        $this->db->query('INSERT INTO user(role, username, password, nama, alamat, no_telp) VALUES(:role:, :username:, :password:, :nama:, :alamat:, :no_telp:', $data);

        //Masukkan data ke tabel user
        $this->db->table('user')->insert($data);
    }
}
