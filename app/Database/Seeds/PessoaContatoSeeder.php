<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PessoaContatoSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            'descricao' => '(12) 93085-9303',
            'pessoa_id' => 1
        ];

        $this->db->table('pessoa_contatos')->insert($dados);

        $dados = [
            'descricao' => 'michael-fm@hotmail.com',
            'pessoa_id' => 1
        ];

        $this->db->table('pessoa_contatos')->insert($dados);
    }
}
