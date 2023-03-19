<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EspecialidadeSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            'nome' => 'Cardiologista',
            'descricao' => 'Especialista que cuida do coração.',            
        ];

        $this->db->table('especialidades')->insert($dados);
    }
}
