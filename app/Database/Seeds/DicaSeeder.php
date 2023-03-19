<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DicaSeeder extends Seeder
{
    public function run()
    {        
        $dados = [
            'titulo' => 'Alimentação saudável',
            'texto' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime repellat repellendus veniam voluptate inventore dolor placeat eius magnam ut quibusdam et corrupti provident iste aspernatur vel ratione, ipsa expedita dolorem.',
            'dt_hora' => date('Y-m-d H:i:s')
        ];

        $this->db->table('dicas')->insert($dados);
    }
}
