<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\PessoaContatoEntity;
use App\Models\PessoaContatoModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PessoaContatoController extends BaseController
{
    protected $contatoModel;

    public function __construct()
    {
        $this->contatoModel = new PessoaContatoModel();
    }

    public function index(int $pessoa_id)
    {        
        $contatos = $this->contatoModel
            ->where('pessoa_id', $pessoa_id)
            ->orderBy('descricao')->findAll();

        $dados = [
            'titulo' => 'Lista de Contatos',
            'contatos' => $contatos,
            'pessoa_id' => $pessoa_id
        ];

        return view('paginas/usuario/contato/index', $dados);
    }

    public function novo(int $pessoa_id)
    {
        $dados = [
            'titulo' => 'Cadastro de Contato',
            'contato' => new PessoaContatoEntity(),
            'erros' => [],
            'pessoa_id' => $pessoa_id
        ];

        if ($this->request->is('post')) {
            $contato = new PessoaContatoEntity($this->request->getPost()); 
            
            if ($this->contatoModel->save($contato)) {
                return redirect()->to("usuario/$pessoa_id/contatos")->with('sucesso', 'Contato cadastrado com sucesso!');
            }

            $dados['erros'] = $this->contatoModel->errors();
            $dados['contato'] = $contato;
        }

        return view('paginas/usuario/contato/novo', $dados);
    }

    public function editar(int $pessoa_id, int $id)
    {
        $contato = $this->contatoModel->where('pessoa_id', $pessoa_id)->find($id);

        if (is_null($contato)) {
            throw PageNotFoundException::forPageNotFound('Contato não encontrado.');
        }

        $dados = [
            'titulo' => 'Edição de Contato',
            'contato' => $contato,
            'erros' => [],
            'pessoa_id' => $pessoa_id
        ];

        if ($this->request->is('post')) {
            $contato->fill($this->request->getPost());

            if ($contato->hasChanged()) {
                if ($this->contatoModel->save($contato)) {
                    return redirect()
                        ->to("usuario/$pessoa_id/contatos")
                        ->with('sucesso', 'Contato alterado com sucesso!');
                }
            }
        }

        return view('paginas/usuario/contato/editar', $dados);
    }

    public function excluir(int $pessoa_id, int $id)
    {
        $contato = $this->contatoModel->where('pessoa_id', $pessoa_id)->find($id);

        if (is_null($contato)) {
            throw PageNotFoundException::forPageNotFound('Contato não encontrado.');
        }

        if ($this->contatoModel->delete($id)) {
            return redirect()
                ->to("usuario/$pessoa_id/contatos")
                ->with('sucesso', 'Contato excluído com sucesso!');
        }
    }
}
