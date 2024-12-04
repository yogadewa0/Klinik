<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'tgl_transaksi' => [
                'type'       => 'DATETIME',
                'null'       => false,
            ],
            'biaya_periksa' => [
                'type'       => 'INT',
                'null'       => false,
                'unsigned'   => true,
            ],
            'id_pasien' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'id_user' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
        ]);

        // Menambahkan primary key
        $this->forge->addKey('id_transaksi', true); // Menetapkan id_transaksi sebagai primary key

        // Menambahkan foreign key
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pasien', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');

        // Membuat tabel transaksi
        $this->forge->createTable('transaksi'); 
    }

    public function down()
    {
        $this->forge->dropTable('transaksi'); // Menghapus tabel transaksi saat migrasi dihapus
    }
}