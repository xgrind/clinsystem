<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\PessoaEntity;
use App\Models\PessoaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PessoaController extends BaseController
{
    protected $pessoaModel;

    public function __construct()
    {
        $this->pessoaModel = new PessoaModel();
    }
    
    public function index()
    {
        helper('funcoes');

        $pessoas = $this->pessoaModel->orderBy('nome')->findAll();

        $dados = [
            'titulo' => 'Lista de Usuários',
            'pessoas' => $pessoas
        ];

        return view('paginas/usuario/index', $dados);
    }

    public function novo()
    {
        helper('funcoes');

        $dados = [
            'titulo' => 'Cadastro de Usuário',
            'pessoa' => new PessoaEntity(),
            'erros' => [],
            'estados' => getEstados(),
        ];

        if ($this->request->is('post')) {
            $pessoa = new PessoaEntity($this->request->getPost());

            if (! is_null($pessoa->senha)) {
                $pessoa->dt_senha = date('Y-m-d');
            }

            $foto = $this->request->getFile('foto');

            if ($foto) {
              
                if (! $this->validate($this->getRegras())) {
                    $dados['erros'] = $this->validator->getErrors();
                    $dados['pessoa'] = $pessoa;

                    return view('paginas/usuario/novo', $dados);
                }

                if (! $foto->hasMoved()) {
                    $novoNome = $foto->getRandomName();
                    $foto->move(ROOTPATH . 'public/uploads', $novoNome);
                    $pessoa->foto = $novoNome;
                }                          
            }

            if ($this->pessoaModel->save($pessoa)) {
                return redirect('usuarios')->with('sucesso', 'Usuário cadastrado com sucesso!');
            }

            $dados['erros'] = $this->pessoaModel->errors();
            $dados['pessoa'] = $pessoa;
        }

        return view('paginas/usuario/novo', $dados);
    }

    public function editar(int $id)
    {
        helper('funcoes');
        
        $pessoa = $this->pessoaModel->find($id);

        if (is_null($pessoa)) {
            throw PageNotFoundException::forPageNotFound('Usuário não encontrado.');
        }

        $dados = [
            'titulo' => 'Edição de Usuário',
            'pessoa' => $pessoa,
            'erros' => [],
            'estados' => getEstados()
        ];

        if ($this->request->is('post')) {
            $pessoa->fill($this->request->getPost());

            if ($pessoa->hasChanged()) {
                if ($this->pessoaModel->save($pessoa)) {
                    return redirect('usuarios')->with('sucesso', 'Usuário alterado com sucesso!');
                }

                $dados['erros'] = $this->pessoaModel->errors();
            }
        }

        return view('paginas/usuario/editar', $dados);

    }

    public function visualizar(int $id)
    {
        $pessoa = $this->pessoaModel->find($id);

        if (is_null($pessoa)) {
            throw PageNotFoundException::forPageNotFound('Usuário não encontrado.');
        }

        $dados = [
            'titulo' => 'Visualização de Usuário',
            'pessoa' => $pessoa
        ];

        return view('paginas/usuario/visualizar', $dados);        
    }

    public function excluir(int $id)
    {
        if ($id === 1) {
            return redirect('usuarios')->with('erro', 'Este usuário não pode ser excluído!');
        }

        $pessoa = $this->pessoaModel->find($id);

        if (is_null($pessoa)) {
            throw PageNotFoundException::forPageNotFound('Usuário não encontrado.');
        }

        if ($this->pessoaModel->delete($id)) {
            return redirect('usuarios')->with('sucesso', 'Usuário excluído com sucesso!');
        }
    }

    private function getRegras()
    {
        $regras = [
            'foto' => [
                'label' => 'Foto',
                'rules' => [
                    'uploaded[foto]',
                    'is_image[foto]',
                    'mime_in[foto,image/png,image/jpg,image/jpeg]',
                    // 'max_size[foto,1024]',
                    // 'max_dims[foto,1024,768]'
                ],
            ]
        ];

        return $regras;
    }
}
