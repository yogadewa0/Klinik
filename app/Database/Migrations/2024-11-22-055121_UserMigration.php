<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => false,
            ],
            'role'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
                'null'           => false, // Jika role wajib diisi
            ],
            'username'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => false, // Jika username wajib diisi
            ],
            'password'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false, // Jika password wajib diisi
            ],
            'nama'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => false,
            ],
            'alamat'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false, // Jika alamat wajib diisi
            ],
            'no_telp'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 15,
                'null'           => false, // Jika no_telp wajib diisi
            ],
        ]);

        $this->forge->addKey('id_user', true); // Menetapkan id_user sebagai primary key
        $this->forge->createTable('user'); // Membuat tabel user
    }

    public function down()
    {
        $this->forge->dropTable('user'); // Menghapus tabel user saat migrasi dihapus
    }
}