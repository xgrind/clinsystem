<?php

function getEstados()
{
    $estadosBrasileiros = [
        '' => '-- Selecione --',
        'AC'=>'Acre',
        'AL'=>'Alagoas',
        'AP'=>'Amapá',
        'AM'=>'Amazonas',
        'BA'=>'Bahia',
        'CE'=>'Ceará',
        'DF'=>'Distrito Federal',
        'ES'=>'Espírito Santo',
        'GO'=>'Goiás',
        'MA'=>'Maranhão',
        'MT'=>'Mato Grosso',
        'MS'=>'Mato Grosso do Sul',
        'MG'=>'Minas Gerais',
        'PA'=>'Pará',
        'PB'=>'Paraíba',
        'PR'=>'Paraná',
        'PE'=>'Pernambuco',
        'PI'=>'Piauí',
        'RJ'=>'Rio de Janeiro',
        'RN'=>'Rio Grande do Norte',
        'RS'=>'Rio Grande do Sul',
        'RO'=>'Rondônia',
        'RR'=>'Roraima',
        'SC'=>'Santa Catarina',
        'SP'=>'São Paulo',
        'SE'=>'Sergipe',
        'TO'=>'Tocantins'
    ];

    return $estadosBrasileiros;
}

function getTipo($tipo)
{
    switch ($tipo) {
        case 'adm': return 'Administrador';
        case 'sec': return 'Secretário';
        case 'med': return 'Médico';
        case 'pac': return 'Paciente';
        default: return 'Erro';
    }
}

function getSexo($sexo)
{
    return match($sexo) {
        'm' => 'Masculino',
        'f' => 'Feminino'
    };
}