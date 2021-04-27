<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Login;
use Core\Request;
use App\Models\Anotacao;

class LoginController extends Controller {
    
    public function index(Request $request) {
        if($request->isMethod('get')){
            $this->view('login');
        }else{    
            $loginModel = new Login();

            $condicao = [
                'email' => $request->post('email'),
                'senha' => $request->post('senha')
            ];

            $logins = $loginModel->getAll($condicao);

            $anotacaoModel = new Anotacao();

            $anotacao = $anotacaoModel->getAll();
    
            
            if(empty($logins)){
                $mensagem = "* E-mail ou senha invalido";
                $this->view('login', ['mensagem' => $mensagem, 'logins' => $logins]);
            }else{
                $view = ['logins' => $logins, 'anotacao' => $anotacao];
                $this->view('diario', $view);
            }
        }
    }    

   
}
