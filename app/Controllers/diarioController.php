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
           
        $anotacaoModel = new Anotacao();
        
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('y-m-d H:i:s');
        
        $botao = $request->post();
        $verifica = array_key_exists("update", $botao);
        
        if($verifica == false){

            //insert enviar
            $dados = [
                'anotacao' => $request->post('anotacao'),
                'dia' => $data   
            ];

                       
            $texto = $request->post('anotacao');
            
            if(empty($texto)){

                $anotacao = $anotacaoModel->getAll();
        
                $view = ['anotacao' => $anotacao, 'texto' => $texto];
                $this->view('diario', $view);

            }else{
                
                $anotacaoModel->inserir($dados);
            }

        }else{

            $textoEdit = $request->post('anotacao');
             
            if(empty($textoEdit)){

                $anotacao = $anotacaoModel->getAll();
               
                $dados = $request->post();
            
                $id = $dados['update'];
    
                $update = $anotacaoModel->getId($id);

                $view = ['anotacao' => $anotacao, 'vazio' => 'vazio', 'update' => $update];
                $this->view('diario', $view);
                

            }else{
                
                //update
                
            $dados = [
                'anotacao' => $request->post('anotacao'),
                'dia' => $data
            ];

            $id = $botao['update']; 
            $anotacaoModel->atualizar($dados,$id); 
            
            }
            

        }
        
        //read        
        $anotacao = $anotacaoModel->getAll();
        
        $view = ['anotacao' => $anotacao];
        
        $this->view('diario', $view);

        }
       
    }
    public function edita(Request $request){
        
        $anotacaoModel = new Anotacao();
               
        $botao = $request->post();
        
        $verifica = array_key_exists("excluir",$botao);
        
       

        if($verifica == true){

            $id = $botao['excluir'];
           
            $deleta = $anotacaoModel->deletar($id);
                        
            $anotacao = $anotacaoModel->getAll();
            $view = ['anotacao' => $anotacao];

            $this->view('diario', $view);

        }else{
            

            $anotacao = $anotacaoModel->getAll();
            

            $id = $botao['editar'];
            
            $update = $anotacaoModel->getId($id);

            $view = ['anotacao' => $anotacao, 'update' => $update];

            $this->view('diario', $view);
        }

      

    }
}