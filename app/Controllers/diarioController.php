<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Anotacao;
use Core\Request;
use Core\Session;

class DiarioController extends Controller {
    
    private $session;

    public function __construct(){
        $this->session = Session::getInstance();
        $user = $this->session->get('user');
        
        if($user == null){
            $this->redirect('login');
        }   
    }
    public function index(Request $request) {
       if($request->isMethod('get')){
        
        $getAnotacao = new Anotacao();
        $anotacao = $getAnotacao->getAll();
        
        $user = $this->session->get('user');
        $view = ['anotacao' => $anotacao, 'user' => $user];

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
                $user = $this->session->get('user');
                
                $view = ['anotacao' => $anotacao, 'texto' => $texto, 'user' => $user];
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

                $view = ['anotacao' => $anotacao, 'vazio' => 'vazio', 'update' => $update, 'user' => $user];
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
        $user = $this->session->get('user');
        //read        
        $anotacao = $anotacaoModel->getAll();
        
        $view = ['anotacao' => $anotacao, 'user' => $user];
        
        $this->view('diario', $view);

        }
       
    }
    public function edita(Request $request){
        
        if($request->isMethod('get')){
            $this->redirect('../diario');
        }

        $anotacaoModel = new Anotacao();
            
        $botao = $request->post();
        $verifica = array_key_exists("excluir",$botao);
        
        //session
        $user = $this->session->get('user');
       

        if($verifica == true){

            $id = $botao['excluir'];
           
            $deleta = $anotacaoModel->deletar($id);
                        
            $anotacao = $anotacaoModel->getAll();
            $view = ['anotacao' => $anotacao, 'user' => $user];

            $this->view('diario', $view);

        }else{
            

            $anotacao = $anotacaoModel->getAll();
            

            $id = $botao['editar'];
            
            $update = $anotacaoModel->getId($id);

            $view = ['anotacao' => $anotacao, 'update' => $update, 'user' => $user];

            $this->view('diario', $view);
        }

      

    }
}