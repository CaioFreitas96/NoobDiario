<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Anotacao;
use Core\Request;

class DiarioController extends Controller {
    
    public function index(Request $request) {
       if($request->isMethod('get')){
        
        $getAnotacao = new Anotacao();
        $anotacao = $getAnotacao->getAll();

        $view = ['anotacao' => $anotacao];

        $this->view('diario', $view); 

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
        //$condicao = ['anotacao' => 'teste de data'];
        $anotacao = $AnotacaoModel->getAll();
        $id = $anotacao[0]['id'];
        $view = ['anotacao' => $anotacao, 'id' => $id];
        
        $this->view('diario', $view);
        }
       
    }
    public function edita(Request $request){
        
        $anotacaoModel = new Anotacao();
               

        $botao = $request->post('excluir');
        
        $anotacao = $anotacaoModel->getAll();

         
                
     
       
            
        
        $view = ['anotacao' => $anotacao];

        $this->view('diario', $view);

    }
}