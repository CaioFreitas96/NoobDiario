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
            
         
           $email2 = ['email' => $request->post('email')];
           $emailDuplicado = $cadastroModel->getEmail($email2);
           

            $validacaoNome = $request->post('nome');
            $testeEmail = filter_var($request->post('email'), FILTER_VALIDATE_EMAIL);
            $validacaoSenha = $request->post('senha');
            
            if($testeEmail == false || $validacaoNome == null 
            || $validacaoSenha == null || !empty($emailDuplicado)){

                //$email = " * E-mail invalido";
                $this->view('cadastro', ['emailDuplicado' => $emailDuplicado, 'email' => $request->post('email'), 'emailfalho' => '* E-mail invalido',
                 'nome' =>  $request->post('nome'), 'testeEmail' => $testeEmail, 'erroNome' => "* Nome vazio",
                  'validacaoNome' => $validacaoNome, 'erroSenha' => "* Senha vazia" ,'validacaoSenha' => $validacaoSenha]);
            }else{
                $resposta = $cadastroModel->inserir($request->post());

                

                $this->view('cadastroRealizado', ['resposta' => $resposta, 'emailDuplicado' => $emailDuplicado]);
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