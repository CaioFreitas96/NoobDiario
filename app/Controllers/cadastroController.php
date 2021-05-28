<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Cadastro;
// Esse use serve para você poder usar o Request, que abstrai tudo relacionado a requisição
use Core\Request;


class CadastroController extends Controller{
    
    public function index(Request $request){
        if($request->isMethod('get')){
            $this->view('cadastro', ['get' => 'get']);
        }else{
            $cadastroModel = new Cadastro();
            
           // EMAIL
           $email = ['email' => $request->post('email')];
           $emailDuplicado = $cadastroModel->getEmail($email);
           
           //NOME
           $nome = $request->post('nome');
           
           //CPF
           $cpf = $request->post('cpf');
           $validaCPF = $cadastroModel->validaCPF($cpf);
           
           
           //TEL
           $tel = $request->post('telefone');
           $validaTelefone = $cadastroModel->validaTelefone($tel);
           
           //EMAIL
           $filter = filter_var($request->post('email'), FILTER_VALIDATE_EMAIL);
           $email = ['email' => $request->post('email')];
           $emailDuplicado = $cadastroModel->getEmail($email);
           
           //SENHA
           $senha = $request->post('senha');
           $strlen = strlen($senha);

           //DADOS ENVIADOS POST
           $dados = $request->post(); 
                
            
            if($nome == null ){
                $this->view('cadastro', ['nome' => $nome, 'dados' => $dados]);
            }else if($validaCPF === false){
                $this->view('cadastro', ['cpf' => $cpf, 'dados' => $dados]);
            }else if($validaTelefone === false){
                $this->view('cadastro', ['tel' => $tel, 'dados' => $dados]);
            }else if($filter === false || !empty($emailDuplicado)){
                if($filter === false){
                    $this->view('cadastro', ['email' => $email, 'dados' => $dados]);
                }else{
                    $this->view('cadastro', ['emailDuplicado' => $emailDuplicado, 'dados' => $dados]);
                }
            }else if($senha == null || $strlen < 8 ){
                $this->view('cadastro', ['senha' => $senha, 'dados' => $dados]);
            }else{
                
                $inserir = $cadastroModel->inserir($request->post());
                $dados = $request->post();
                                
                unset($dados['cpf']);
                $this->view('cadastroRealizado', ['dados' => $dados] );
            }
        }
       
    }

    public function realizado(Request $request){

        var_dump($request->post('nome'));
        //$this->view('login');
    }

    /*public function request(Request $request){

    }*/
   
}