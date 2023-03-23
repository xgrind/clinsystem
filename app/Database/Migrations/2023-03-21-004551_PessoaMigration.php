<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PessoaMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'tipo' => [
                'type' => 'CHAR',
                'constraint' => 3,
                'null' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'ativo' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'default' => 's'
            ],
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'rg' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
            ],
            'sexo' => [
                'type' => 'CHAR',
                'constraint' => 1
            ],
            'dt_nasc' => [
                'type' => 'DATE',
            ],
            'logradouro' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'numero' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'bairro' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'cidade' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'estado' => [
                'type' => 'CHAR',
                'constraint' => 2
            ],
            'cep' => [
                'type' => 'CHAR',
                'constraint' => 10,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'senha' => [
                'type' => 'CHAR',
                'constraint' => 60,
                'null' => true,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'dt_senha' => [
                'type' => 'DATE',
                'null' => true,
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
        $this->forge->createTable('pessoas');
    }

    public function down()
    {
        $this->forge->dropTable('pessoas');
    }
}
