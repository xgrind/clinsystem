<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ConvenioSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            'nome' => 'Particular',
            'ans' => 'P04',
            'sigla' => 'Ptc'
        ];

        $this->db->table('convenios')->insert($dados);
    }
}
