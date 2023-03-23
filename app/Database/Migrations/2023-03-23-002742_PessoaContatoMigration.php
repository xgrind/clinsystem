<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PessoaContatoMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',               
                'auto_increment' => true,
            ],
            'descricao' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pessoa_id' => [
                'type' => 'INT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pessoa_id', 'pessoas', 'id');
        $this->forge->createTable('pessoa_contatos');
    }

    public function down()
    {
        $this->forge->dropTable('pessoa_contatos');
    }
}
