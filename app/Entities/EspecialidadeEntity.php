<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class EspecialidadeEntity extends Entity
{
    protected $attributes = [
        'id' => null,
        'nome' => null,
        'descricao' => null,
        'ativo' => 's',
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
