<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\MedicoEntity;
use App\Entities\PessoaEntity;
use App\Models\ConvenioModel;
use App\Models\EspecialidadeModel;
use App\Models\MedicoConvenioModel;
use App\Models\MedicoEspecialidadeModel;
use App\Models\MedicoModel;
use App\Models\PessoaContatoModel;
use App\Models\PessoaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PessoaController extends BaseController
{
    protected $pessoaModel;
    protected $medicoModel;
    protected $medicoEspecialidadeModel;
    protected $medicoConvenioModel;

    public function __construct()
    {
        helper('funcoes');

        $this->pessoaModel = new PessoaModel();
        $this->medicoModel = new MedicoModel();
        $this->medicoEspecialidadeModel = new MedicoEspecialidadeModel();
        $this->medicoConvenioModel = new MedicoConvenioModel();
        
        
    }
    
    public function index(string $tipo = null)
    {      
        if (is_null($tipo)) {
            $pessoas = $this->pessoaModel->orderBy('nome')->findAll();
        } else {
            $pessoas = $this->pessoaModel->where('tipo', $tipo)->orderBy('nome')->findAll();
        }
        // $pessoas = $this->pessoaModel->where('tipo', $tipo)->orderBy('nome')->findAll();

        $dados = [
            'titulo' => 'Lista de Usuários',
            'pessoas' => $pessoas,
            'tipo' => $tipo
        ];

        return view('paginas/usuario/index', $dados);
    }

    // public function novo($tipo = null)
    // {                        
    //     $especialidadeModel = new EspecialidadeModel();
    //     $convenioModel = new ConvenioModel();

    //     $dados = [
    //         'titulo' => 'Cadastro de Usuário',
    //         'pessoa' => new PessoaEntity(),
    //         'erros' => [],
    //         'estados' => getEstados(),
    //         'tipo' => $tipo,
    //         'especialidades' => $especialidadeModel->orderBy('nome')->findAll(),
    //         'convenios' => $convenioModel->orderBy('nome')->findAll(),
    //     ];

    //     if ($this->request->is('post')) {
    //         $pessoa = new PessoaEntity($this->request->getPost());            

    //         if (! is_null($pessoa->senha)) {
    //             $pessoa->dt_senha = date('Y-m-d');
    //         }           

    //         $foto = $this->request->getFile('foto');            
            
    //         if ($foto->isValid()) {
              
    //             if (! $this->validate($this->getRegras())) {
    //                 $dados['erros'] = $this->validator->getErrors();
    //                 $dados['pessoa'] = $pessoa;

    //                 return view('paginas/usuario/novo', $dados);
    //             }

    //             if (! $foto->hasMoved()) {
    //                 $novoNome = $foto->getRandomName();
    //                 $foto->move(ROOTPATH . 'public/uploads', $novoNome);
    //                 $pessoa->foto = $novoNome;
    //             }                          
    //         }            

    //         if ($this->pessoaModel->save($pessoa)) {
    //             return redirect('usuarios')->with('sucesso', 'Usuário cadastrado com sucesso!');
    //         }

    //         $dados['erros'] = $this->pessoaModel->errors();
    //         $dados['pessoa'] = $pessoa;
    //     }

    //     return view('paginas/usuario/novo', $dados);
    // }

    public function novo($tipo = null)
    {                        
        $especialidadeModel = new EspecialidadeModel();
        $convenioModel = new ConvenioModel();

        $dados = [
            'titulo' => 'Cadastro de Usuário',
            'pessoa' => new PessoaEntity(),
            'erros' => [],
            'estados' => getEstados(),
            'tipo' => $tipo,
            'especialidades' => $especialidadeModel->orderBy('nome')->findAll(),
            'convenios' => $convenioModel->orderBy('nome')->findAll(),
            'medico' => new MedicoEntity(),            
        ];

        if ($this->request->is('post')) {
            $pessoa = new PessoaEntity($this->request->getPost());            

            if (! is_null($pessoa->senha)) {
                $pessoa->dt_senha = date('Y-m-d');
            }           

            $foto = $this->request->getFile('foto');            
            
            if ($foto->isValid()) {
              
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

                if ($tipo === 'med') {
                    $medico = new MedicoEntity($this->request->getPost());
                    $medico->pessoa_id = $this->pessoaModel->getInsertID();                                        

                    if ($this->medicoModel->save($medico)) {
                        
                        $medicoEspecialidades = $this->request->getVar('especialidade_id[]');                        
                        
                        foreach ($medicoEspecialidades as $especialidade_id) {
                            $this->medicoEspecialidadeModel->insert([
                                'medico_id' => $this->medicoModel->getInsertID(),
                                'especialidade_id' => $especialidade_id
                            ]);                           
                        }     
                        
                        $medicoConvenios = $this->request->getVar('convenio_id[]');

                        foreach ($medicoConvenios as $convenio_id) {
                            $this->medicoConvenioModel->insert([
                                'medico_id' => $this->medicoModel->getInsertID(),
                                'convenio_id' => $convenio_id,
                            ]);
                        }

                        return redirect('usuarios')->with('sucesso', 'Usuário cadastrado com sucesso');
                    }

                    $dados['medico'] = $medico;
                    $dados['pessoa'] = $pessoa;
                    $dados['erros'] = $this->medicoModel->errors();                    
                }

                return redirect('usuarios')->with('sucesso', 'Usuário cadastrado com sucesso!');                
            }

            $dados['erros'] = $this->pessoaModel->errors();
            $dados['pessoa'] = $pessoa;
        }

        return view('paginas/usuario/novo', $dados);
    }

    public function editar(int $id)
    {               
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

    public function perfil()
    {        
        if (session()->logado) {
            $pessoa = $this->pessoaModel->find(session()->id);

            $pessoaContatoModel = new PessoaContatoModel();

            $contatos = $pessoaContatoModel->where('pessoa_id', $pessoa->id)->findAll();            

            $dados = [
                'titulo' => 'Meu Perfil',
                'pessoa' => $pessoa,
                'contatos' => $contatos
            ];

            return view('paginas/usuario/perfil', $dados);
        }
    }

    public function conta()
    {
        $dados = [
            'titulo' => 'Alterar Conta'
        ];

        return view('paginas/usuario/conta', $dados);
    }

    public function senha()
    {
        $dados = [
            'titulo' => 'Redefinir Senha',
            'erros' => [],
        ];

        if ($this->request->is('post')) {
            if (session()->logado) {
                $pessoa = $this->pessoaModel->find(session()->id);

                if (is_null($pessoa)) {
                    throw PageNotFoundException::forPageNotFound('Usuário não encontrado.');
                }               

                if (! password_verify($this->request->getVar('atual'), $pessoa->senha)) {
                    return redirect('senha')->with('erro', 'Senha atual errada.');
                }
                
                $pessoa->fill($this->request->getPost());

                if ($pessoa->hasChanged()) {

                    if ($this->pessoaModel->save($pessoa)) {
                        return redirect()->to(site_url())->with('sucesso', 'Senha alterada com sucesso!');
                    }

                    $dados['erros'] = $this->pessoaModel->errors();
                }
                
            }
        }

        return view('paginas/usuario/senha', $dados);        
    }

    public function email()
    {
        $dados = [
            'titulo' => 'Redefinir E-mail',
            'erros' => [],
        ];

        if ($this->request->is('post')) {
            if (session()->logado) {
                $pessoa = $this->pessoaModel->find(session()->id);

                if (is_null($pessoa)) {
                    throw PageNotFoundException::forPageNotFound('Usuário não encontrado.');
                }                               

                if ($this->request->getVar('atual') !== $pessoa->email) {
                    return redirect('email')->with('erro', 'E-mail atual errado.');
                }

                $pessoa->email = $this->request->getVar('email');

                if ($pessoa->hasChanged()) {

                    if ($this->pessoaModel->save($pessoa)) {
                        return redirect()->to(site_url())->with('sucesso', 'E-mail alterado com sucesso!');
                    }

                    $dados['erros'] = $this->pessoaModel->errors();
                }
                
            }
        }

        return view('paginas/usuario/email', $dados);        
    }
}
