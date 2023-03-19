<?php

namespace App\Models;

use CodeIgniter\Model;

class DicaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dicas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\DicaEntity::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['foto', 'titulo', 'texto', 'dt_hora'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'foto' => [
            'label' => 'Foto',
            'rules' => 'max_length[255]',
        ],
        'titulo' => [
            'label' => 'Título',
            'rules' => 'required|min_length[3]|max_length[255]',
        ],
        'texto' => [
            'label' => 'Texto',
            'rules' => 'required|string'
        ],        
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
