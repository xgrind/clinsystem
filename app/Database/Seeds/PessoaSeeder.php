<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PessoaSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            'tipo' => 'adm',
            'nome' => 'Michael Martins',            
            'cpf' => '368.632.918-27',
            'rg' => '42.130.059-0',
            'sexo' => 'm',
            'dt_nasc' => '1987-05-29',
            'logradouro' => 'Rua Jorge Salomão Kopaz',
            'numero' => 190,
            'bairro' => 'Jardim Paraíba',
            'cidade' => 'Aparecida',
            'estado' => 'SP',
            'cep' => '12.575-178',
            'email' => 'michaelfm21@gmail.com',
            'senha' => password_hash('12345', PASSWORD_DEFAULT),
            'dt_senha' => date('Y-m-d')
        ];

        $this->db->table('pessoas')->insert($dados);
    }
}
