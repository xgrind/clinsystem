<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\ConvenioEntity;
use App\Models\ConvenioModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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

    public function novo()
    {
        $dados = [
            'titulo' => 'Cadastro de Convênio',
            'convenio' => new ConvenioEntity(),
            'erros' => []
        ];

        if ($this->request->is('post')) {
            $convenio = new ConvenioEntity($this->request->getPost());

            if ($this->convenioModel->save($convenio)) {
                return redirect('convenios')->with('sucesso', 'Convênio cadastrado com sucesso!');
            }

            $dados['erros'] = $this->convenioModel->errors();
            $dados['convenio'] = $convenio;
        }

        return view('paginas/convenio/novo', $dados);
    }

    public function editar(int $id)
    {
        $convenio = $this->convenioModel->find($id);

        if (is_null($convenio)) {
            throw PageNotFoundException::forPageNotFound('Convênio não encontrado.');
        }

        $dados = [
            'titulo' => 'Edição de Convênio',
            'convenio' => $convenio,
            'erros' => []
        ];

        if ($this->request->is('post')) {
            $convenio->fill($this->request->getPost());

            if ($convenio->hasChanged()) {
                if ($this->convenioModel->save($convenio)) {
                    return redirect('convenios')->with('sucesso', 'Convênio alterado com sucesso!');
                }

                $dados['erros'] = $this->convenioModel->errors();
            }
        }

        return view('paginas/convenio/editar', $dados);
    }

    public function excluir(int $id)
    {
        $conveio = $this->convenioModel->find($id);

        if (is_null($conveio)) {
            throw PageNotFoundException::forPageNotFound('Convênio não encontrado.');
        }

        if ($this->convenioModel->delete($id)) {
            return redirect('convenios')->with('sucesso', 'Convênio excluído com sucesso!');
        }
    }

    
}
