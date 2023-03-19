<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\DicaEntity;
use App\Models\DicaModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Exceptions\PageNotFoundException;

class DicaController extends BaseController
{
    protected $dicaModel;

    public function __construct()
    {
        $this->dicaModel = new DicaModel();
    }

    public function index()
    {
        $dicas = $this->dicaModel
            ->select('id, titulo, texto, DATE_FORMAT(dt_hora, "%d/%m/%Y %H:%i:%s") AS dt_hora')
            ->orderBy('dt_hora', 'desc')->findAll();

        $dados = [
            'titulo' => 'Lista de Dicas',
            'dicas' => $dicas,            
        ];

        return view('paginas/dica/index', $dados);       

    }

    // public function novo()
    // {
    //     $dados = [
    //         'titulo' => 'Cadastro de Dica',
    //         'dica' => new DicaEntity(),
    //         'erros' => []
    //     ];

    //     if ($this->request->is('post')) {
    //         $dica = new DicaEntity($this->request->getPost());

    //         if ($this->dicaModel->save($dica)) {
    //             return redirect('dicas')->with('sucesso', 'Dica cadastrada com sucesso');
    //         }

    //         $dados['erros'] = $this->dicaModel->errors();
    //         $dados['dica'] = $dica;
    //     }

    //     return view('paginas/dica/novo', $dados);
    // }

    public function novo()
    {
        $dados = [
            'titulo' => 'Cadastro de Dica',
            'dica' => new DicaEntity(),
            'erros' => []
        ];

        if ($this->request->is('post')) {            
            $dica = new DicaEntity($this->request->getPost());                      

            if ($this->validate($this->getRegras())) {

                $this->upload($dica);                               
    
                if ($this->dicaModel->save($dica)) {
                    return redirect('dicas')->with('sucesso', 'Dica cadastrada com sucesso');
                }       
                
                $dados['erros'] = $this->dicaModel->errors();
                $dados['dica'] = $dica;
            }

            $dados['erros'] = $this->validator->getErrors();
            $dados['dica'] = $dica;          
        }

        return view('paginas/dica/novo', $dados);
    }

    public function editar($id)
    {
        $dica = $this->dicaModel->find($id);

        if (is_null($dica)) {
            throw PageNotFoundException::forPageNotFound('Dica não encontrada.');                    
        }

        $dados = [
            'titulo' => 'Edição de Dica',
            'dica' => $dica,
            'erros' => []
        ];

        if ($this->request->is('post')) {
            $dica->fill($this->request->getPost());

            if ($this->validate($this->getRegras())) {
                $this->upload($dica);

                if ($dica->hasChanged()) {
                    if ($this->dicaModel->save($dica)) {
                        return redirect('dicas')->with('sucesso', 'Dica alterada com sucesso!');
                    }

                    $dados['erros'] = $this->dicaModel->errors();
                }
            }

            $dados['erros'] = $this->validator->getErrors();           
        }

        return view('paginas/dica/editar', $dados);

    }

    public function excluir($id)
    {
        $dica = $this->dicaModel->find($id);

        if (is_null($dica)) {
            throw PageNotFoundException::forPageNotFound('Dica não encontrada.');
        }

        if ($this->dicaModel->delete($id)) {
            return redirect('dicas')->with('sucesso', 'Dica excluída com sucesso!');
        }

    }

    public function visualizar($id)
    {
        $dica = $this->dicaModel->find($id);

        if (is_null($dica)) {
            throw PageNotFoundException::forPageNotFound('Dica não encontrada.');
        }

        $dados = [
            'titulo' => 'Visualização de Dica',
            'dica' => $dica
        ];

        return view('paginas/dica/visualizar', $dados);
    }

    /**
     * Regras de validação do envio
     *
     * @return void
     */
    private function getRegras()
    {
        $regras = [
            'foto' => [
                'label' => 'Foto',
                'rules' => [
                    'is_image[foto]',
                    'ext_in[foto,jpg,png,jpeg]'
                ]
            ],
        ];

        return $regras;
    }

    private function upload(DicaEntity $dica)
    {
        $foto = $this->request->getFile('foto');

        if ($foto) {                  
            if ($foto->isValid() && ! $foto->hasMoved()) {                    
                $novoNome = $foto->getRandomName();
                $foto->move(ROOTPATH . 'public/uploads', $novoNome);
                $dica->foto = $novoNome;
            }                            
        }
    }
}
