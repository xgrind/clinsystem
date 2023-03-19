<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConvenioModel;

class ConvenioController extends BaseController
{
    protected $convenioModel;

    public function __construct()
    {
        $this->convenioModel = new ConvenioModel();
    }

    public function index()
    {
        $convenios = $this->convenioModel->orderBy('nome')->findAll();

        $dados = [
            'titulo' => 'Lista de Convênios',
            'convenios' => $convenios
        ];

        return view('paginas/convenio/index', $dados);
    }

    
}
