<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PessoaModel;

class LoginController extends BaseController
{
    protected $pessoaModel;

    public function __construct()
    {
        $this->pessoaModel = new PessoaModel();
    }

    public function index()
    {
        //
    }   

    public function entrar()
    {
        $dados = [
            'titulo' => 'Login',
            'erros' => [],
        ];

        if ($this->request->is('post')) {
            $senha = $this->request->getVar('senha');
            $email = $this->request->getVar('email');

            $pessoa = $this->pessoaModel->where('email', $email)->first();

            // dd($pessoa);

            if (! is_null($pessoa)) {                
                if (password_verify($senha, $pessoa->senha)) {
                    $sessao = [
                        'tipo' => $pessoa->tipo,
                        'nome' => $pessoa->nome, 
                        'id' => $pessoa->id,
                        'logado' => true
                    ];

                    session()->set($sessao);

                    

                    return redirect()->to(site_url());
                }               
            }                      

            // $dados['erros'] = ['Usuário e/ou senha inválida.'];
            return redirect('login')->with('erro', 'Usuário e/ou senha inválida.');
        }

        return view('paginas/login/entrar', $dados);
    }

    public function sair()
    {
        session()->destroy();
        session()->set(['logado' => false]);

        return redirect()->to(site_url());
    }
}
