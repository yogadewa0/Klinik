<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RekamMedisMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rekam_medis' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'id_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => 25,
                'null'       => false,
            ],
            'tgl_kunjungan' => [
                'type'       => 'DATETIME',
                'null'       => false,
            ],
            'diagnosa' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true, // Diagnosa bisa null
            ],
            'penanganan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true, // Penanganan bisa null
            ],
            'id_user' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
        ]);

        // Menambahkan primary key
        $this->forge->addKey('id_rekam_medis', true); // Menetapkan id_rekam_medis sebagai primary key

        // Menambahkan foreign key
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pasien', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');

        // Membuat tabel rekam_medis
        $this->forge->createTable('rekam_medis'); 
    }

    public function down()
    {
        $this->forge->dropTable('rekam_medis'); // Menghapus tabel rekam_medis saat migrasi dihapus
    }
}