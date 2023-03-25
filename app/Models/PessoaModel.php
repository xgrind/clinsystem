<?php

namespace App\Models;

use CodeIgniter\Model;

class PessoaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pessoas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\PessoaEntity::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['tipo', 'nome', 'ativo', 'cpf', 'rg', 'sexo',
    'dt_nasc', 'logradouro', 'numero', 'bairro', 'cidade', 'estado', 'cep', 
    'email', 'senha', 'foto', 'dt_senha'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'tipo' => [
            'label' => 'Tipo',
            'rules' => 'required'
        ],
        'nome' => [
            'label' => 'Nome',
            'rules' => 'required|max_length[100]',
        ],
        'ativo' => [
            'label' => 'Ativo',
            'rules' => 'in_list[s,n]'
        ],
        'cpf' => [
            'label' => 'CPF',
            'rules' => 'required|max_length[15]',
        ],
        'rg' => [
            'label' => 'R.G.',
            'rules' => 'required|max_length[13]',
        ],
        'sexo' => [
            'label' => 'Sexo',
            'rules' => 'required|in_list[m,f]'
        ],
        'logradouro' => [
            'label' => 'Logradouro',
            'rules' => 'required|max_length[200]'
        ],
        'numero' => [
            'label' => 'Número',
            'rules' => 'required|max_length[5]'
        ],
        'bairro' => [
            'label' => 'Bairro',
            'rules' => 'required|max_length[100]'
        ],
        'cidade' => [
            'label' => 'Cidade',
            'rules' => 'required|max_length[100]'
        ],
        'estado' => [
            'label' => 'Estado',
            'rules' => 'required|exact_length[2]'
        ],
        'cep' => [
            'label' => 'Logradouro',
            'rules' => 'required|max_length[10]'
        ],
        'email' => [
            'label' => 'E-mail',
            'rules' => 'max_length[100]|valid_email|permit_empty'
        ],        
        'confirme' => [
            'label' => 'Confirme a Senha',
            'rules' => 'required_with[senha]|matches[senha]'
        ],

    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['senha'])) {
            return $data;            
        }

        $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);        
        return $data;
    }

    
}
