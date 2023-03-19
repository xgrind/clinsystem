<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class DicaEntity extends Entity
{
    protected $attributes = [
        'id' => null,
        'foto' => null,
        'titulo' => null,
        'texto' => null,
        'dt_hora' => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
