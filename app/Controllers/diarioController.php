<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Login;
use App\Models\Anotacao;
use Core\Request;

class DiarioController extends Controller {
    
    public function index(Request $request) {
       
        
            if($request->isMethod('get')){
                $this->view('diario');
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
                    $mensagem = "E-mail ou senha invalido";
                    $this->view('login', ['mensagem' => $mensagem, 'logins' => $logins]);
                }else{
                    $view = ['logins' => $logins, 'anotacao' => $anotacao];
                    $this->view('anotacao', $view);
                }
            }
        //$anotacaoModel = new Anotacao();

        //$anotacao = $anotacaoModel->getAll();

      //  $view = ['anotacao' => $anotacao];

        //$this->view('anotacao', $view);
        
        
        
        

    }
    
}