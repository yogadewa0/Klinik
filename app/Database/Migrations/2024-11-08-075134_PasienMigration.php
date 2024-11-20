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
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'tgl_lahir' => [
                'type' => 'DATE',
            ],
            'gol_darah' => [
                'type' => 'ENUM',
                'constraint' => ['A', 'B', 'AB', 'O'],
            ],
            'alergi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
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