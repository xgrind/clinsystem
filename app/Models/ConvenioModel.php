<?php

namespace App\Models;

use CodeIgniter\Model;

class ConvenioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'convenios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\ConvenioEntity::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'ans', 'sigla', 'ativo'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nome' => [
            'label' => 'Nome',
            'rules' => 'required|min_length[3]|max_length[100]',
        ],
        'ans' => [
            'label' => 'ANS',
            'rules' => 'max_length[100]',
        ],
        'sigla' => [
            'label' => 'Sigla',
            'rules' => 'max_length[100]',
        ],
        'ativo' => [
            'label' => 'Ativo',
            'rules' => 'required|in_list[s,n]'
        ]
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
