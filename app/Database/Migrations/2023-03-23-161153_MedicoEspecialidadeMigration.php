<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MedicoEspecialidadeMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'medico_id' => [
                'type' => 'INT',              
            ],            
            'especialidade_id' => [
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
        $this->forge->addForeignKey('medico_id', 'medicos', 'id');
        $this->forge->addForeignKey('especialidade_id', 'especialidades', 'id');
        $this->forge->createTable('medico_especialidades');
    }

    public function down()
    {
        $this->forge->dropTable('medico_especialidades');
    }
}
