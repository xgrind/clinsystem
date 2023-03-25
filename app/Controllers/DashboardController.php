<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConvenioModel;
use App\Models\DicaModel;
use App\Models\EspecialidadeModel;
use App\Models\PessoaModel;

class DashboardController extends BaseController
{
    protected $pessoaModel;
    protected $especialidadeModel;
    protected $convenioModel;
    protected $dicaModel;

    public function __construct()
    {
        $this->pessoaModel = new PessoaModel();
        $this->especialidadeModel = new EspecialidadeModel();
        $this->convenioModel = new ConvenioModel();
        $this->dicaModel = new DicaModel();
    }

    public function index()
    {
        $medicos = $this->pessoaModel->where('tipo', 'med')->countAllResults();
        $secretarios = $this->pessoaModel->where('tipo', 'sec')->countAllResults();
        $admins = $this->pessoaModel->where('tipo', 'adm')->countAllResults();        
        $especialidades = $this->especialidadeModel->countAllResults();
        $convenios = $this->convenioModel->countAllResults();
        $dicas = $this->convenioModel->countAllResults();        

        $dados = [
            'titulo' => 'Dashboard',
            'medicos' => $medicos,
            'secretarios' => $secretarios,
            'admins' => $admins,
            'especialidades' => $especialidades,
            'convenios' => $convenios,
            'dicas' => $dicas
        ];

        return view('paginas/dashboard/index', $dados);
    }
}
