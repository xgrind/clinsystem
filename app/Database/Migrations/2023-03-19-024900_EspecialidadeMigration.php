<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EspecialidadeMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'descricao' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'ativo' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'default' => 's',
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
        $this->forge->createTable('especialidades');
    }

    public function down()
    {
        $this->forge->dropTable('especialidades');
    }
}
