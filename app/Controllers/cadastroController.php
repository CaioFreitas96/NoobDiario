<?php

namespace App\Controllers;
use Core\Controller;
use App\Models\Cadastro;
// Esse use serve para você poder usar o Request, que abstrai tudo relacionado a requisição
use Core\Request;


class CadastroController extends Controller{
    
    public function index(Request $request){
        if($request->isMethod('get')){
            $this->view('cadastro');
        }else{
            $cadastroModel = new Cadastro();
            
            $dados = [
            //nome atribuito             nome do formulario
                'nome' =>  $request->post('nome'),
                'email' => filter_var($request->post('email'), FILTER_VALIDATE_EMAIL),
                'senha' => $request->post('senha') 
            ];
            //a variável dados é equivalente a isso: $dados = $request->post()
            //fazer essa converção é bom para coloca os nomes dos dados igual ao do banco, caso ele venha como o nome do formulario diferente a do banco
            //e fazer validações.
            $resposta = $cadastroModel->inserir($dados);

            $this->view('cadastroRealizado', ['resposta' => $resposta], ['dados' => $dados]);
        }
       
    }

    public function realizado(Request $request){

        var_dump($request->post('nome'));
        //$this->view('login');
    }

    /*public function request(Request $request){

    }*/
   
}