<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\EspecialidadeEntity;
use App\Models\EspecialidadeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class EspecialidadeController extends BaseController
{
    protected $especialidadeModel;

    public function __construct()
    {
        $this->especialidadeModel = new EspecialidadeModel();
    }

    public function index()
    {
        $especialidades = $this->especialidadeModel->orderBy('nome')->findAll();

        $dados = [
            'titulo' => 'Lista de Especialidades',
            'especialidades' => $especialidades
        ];        

        return view('paginas/especialidade/index', $dados);
    }

    public function novo()
    {
        $dados = [
            'titulo' => 'Cadastro de Especialidade',
            'especialidade' => new EspecialidadeEntity(),
            'erros' => []
        ];

        if ($this->request->is('post')) {
            $especialidade = new EspecialidadeEntity($this->request->getPost());

            if ($this->especialidadeModel->save($especialidade)) {
                return redirect('especialidades')->with('sucesso', 'Convênio cadastrado com sucesso!');
            }

            $dados['erros'] = $this->especialidadeModel->errors();
            $dados['especialidade'] = $especialidade;
        }

        return view('paginas/especialidade/novo', $dados);
    }

    public function editar(int $id)
    {
        $especialidade = $this->especialidadeModel->find($id);

        if (is_null($especialidade)) {
            throw PageNotFoundException::forPageNotFound('Especialidade não encontrada.');
        }

        $dados = [
            'titulo' => 'Edição de Especialidade',
            'especialidade' => $especialidade,
            'erros' => []
        ];

        if ($this->request->is('post')) {
            $especialidade->fill($this->request->getPost());

            if ($especialidade->hasChanged()) {
                if ($this->especialidadeModel->save($especialidade)) {
                    return redirect('especialidades')->with('sucesso', 'Especialidade alterada com sucesso!');
                }

                $dados['erros'] = $this->especialidadeModel->errors();
            }
        }

        return view('paginas/especialidade/editar', $dados);
    }

    public function excluir(int $id)
    {
        $especialidade = $this->especialidadeModel->find($id);

        if (is_null($especialidade)) {
            throw PageNotFoundException::forPageNotFound('Especialidade não encontrada.');
        }

        if ($this->especialidadeModel->delete($id)) {
            return redirect('especialidades')->with('sucesso', 'Especialidade excluída com sucesso!');
        }
    }

}
