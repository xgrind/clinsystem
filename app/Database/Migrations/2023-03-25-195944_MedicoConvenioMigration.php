<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MedicoConvenioMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'medico_id' => [
                'type' => 'INT',
            ],
            'convenio_id' => [
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
        $this->forge->createTable('medico_convenios');
    }

    public function down()
    {
        $this->forge->dropTable('medico_convenios');
    }
}
