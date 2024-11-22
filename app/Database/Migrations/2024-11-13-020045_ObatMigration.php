<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_obat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => false,
            ],
            'nama'             => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => false,
            ],
            'ukuran'           => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => false,
            ],
            'satuan'           => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
                'null'           => false,
            ],
            'tgl_kadaluarsa'   => [
                'type'           => 'DATETIME',
                'null'           => false,
            ],
            'harga'            => [
                'type'           => 'INT',
                'null'           => false,
                'unsigned'       => true,
            ],
        ]);

        $this->forge->addKey('id_obat', true); // Menetapkan id_obat sebagai primary key
        $this->forge->createTable('obat'); // Membuat tabel obat
    }

    public function down()
    {
        $this->forge->dropTable('obat'); // Menghapus tabel obat saat migrasi dihapus
    }
}
