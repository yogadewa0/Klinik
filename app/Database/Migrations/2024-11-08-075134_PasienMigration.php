<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PasienMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pasien' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => false,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => false,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'notelpon' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
            ],
            'tanggal_lahir' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => false,
            ],
            'golongan_darah' => [
                'type' => 'VARCHAR',
                'constraint' => '3', // Menggunakan VARCHAR untuk gol_darah, panjang maksimum 3 karakter
                'null' => true,
            ],
            'alergi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],            
            
        ]);

        $this->forge->addKey('id_pasien', true); // Set id_pasien sebagai primary key
        $this->forge->createTable('pasien'); // Membuat tabel pasien
    }

    public function down()
    {
        $this->forge->dropTable('pasien'); // Menghapus tabel pasien
    }
}