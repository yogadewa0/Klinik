<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PasienSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'Anna',
            'tgl_lahir' => '1990/02/14',
            'gol_darah' => 'B',
            'alergi' => 'Ikan',
            'alamat' => 'Paingan',
            'no_telp' => '088256543311'
        ]; 

        //Query tambah pasien
        $this->db->query('INSERT INTO pasien(nama, tgl_lahir, gol_darah, alergi, alamat, no_telp) VALUES(:nama:, :tgl_lahir:, :gol_darah:, :alergi:, :alamat:, :no_telp:', $data);

        //Masukkan data ke tabel pasien
        $this->db->table('pasien')->insert($data);
    }
}
