<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ObatMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nama_obat' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'tanggal_kadaluarsa' => [
                'type'       => 'DATETIME',
                'null'       => false,
            ],
            'satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'ukuran' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'harga_obat' => [
                'type'       => 'INT',
                'null'       => false,
                'unsigned'   => true,
            ],
            'kode_obat' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('kode_obat', true); // Menetapkan kode_obat sebagai primary key
        $this->forge->createTable('obat'); // Membuat tabel obat
    }

    public function down()
    {
        $this->forge->dropTable('obat'); // Menghapus tabel obat saat migrasi dihapus
    }
}