<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailRekamMedisMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'anjuran_mantri' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'kodeobat' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'id_rekam_medis' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
        ]);

        // Menambahkan primary key gabungan
        $this->forge->addKey(['kodeobat', 'id_rekam_medis'], true); // Menetapkan kodeobat dan id_rekam_medis sebagai primary key gabungan

        // Menambahkan foreign key
        $this->forge->addForeignKey('kodeobat', 'obat', 'kodeobat', 'CASCADE', 'CASCADE'); // Menambahkan foreign key untuk kodeobat
        $this->forge->addForeignKey('id_rekam_medis', 'rekam_medis', 'id_rekam_medis', 'CASCADE', 'CASCADE'); // Menambahkan foreign key untuk id_rekam_medis

        // Membuat tabel detail_rekam_medis
        $this->forge->createTable('detail_rekam_medis'); 
    }

    public function down()
    {
        // Menghapus tabel detail_rekam_medis saat migrasi dihapus
        $this->forge->dropTable('detail_rekam_medis'); 
    }
}