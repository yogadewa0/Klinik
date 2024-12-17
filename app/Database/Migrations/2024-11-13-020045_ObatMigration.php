<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ObatMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kodeobat' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'namaobat' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'tanggalkadaluarsa' => [
                'type'       => 'DATETIME',
                'null'       => false,
            ],
            'hargaobat' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
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
            
            
        ]);

        $this->forge->addKey('kodeobat', true, 'pk_obat');
        $this->forge->createTable('obat'); // Membuat tabel obat
    }

    public function down()
    {
        $this->forge->dropTable('obat'); // Menghapus tabel obat saat migrasi dihapus
    }
}