<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Anotacao;
use Core\Request;

class AnotacaoController extends Controller {
    
    public function index(Request $request) {
       if($request->isMethod('get')){
        $this->view('diario'); 
       }else{
           
        $AnotacaoModel = new Anotacao();
        
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('y-m-d H:i:s');
        
        //inserir
        $dados = [
            'anotacao' => $request->post('anotacao'),
             'dia' => $data   
        ];

        $AnotacaoModel->inserir($dados);
        
        //ver
        $condicao = ['anotacao' => 'teste de data'];
        $anotacao = $AnotacaoModel->getAll($condicao);

        $view = ['anotacao' => $anotacao];

        $this->view('anotacao', $view);
        }
       
    }
    
}