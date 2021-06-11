<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Login;
use Core\Request;
use App\Models\Anotacao;
use Core\Session;



class LoginController extends Controller {
    
    public function index(Request $request) {
        if($request->isMethod('get')){
            
            $get = "get";
            $this->view('login', ['get' => $get]);

        }else{    
            $loginModel = new Login();
            $email = $request->post('email');
            $validacao = filter_var($request->post('email'), FILTER_VALIDATE_EMAIL);
           
            if($validacao === false){
                $erro = "E-mail invalido";
                $this->view('login', ['erro' => $erro, 'email' => $email]);
            }else{

                $email =  $request->post('email'); 
                $senha =  $request->post('senha');
                $login = $loginModel->login($email, $senha);
                
                   
                switch($login){
                    case false:
                        $erro = "Senha invalida";
                        break;
                    case "email invalido":
                        $erro = "E-mail não cadastrado";
                        break;
                           
                }

                if(is_array($login)){
                    $session = Session::getInstance();
                    $user = $session->set('user', $login);
                    $this->redirect('diario');
                }else{
                    $this->view('login', ['erro' => $erro, 'email' => $email]);
                }    
            }    
        }
    
    }
    public function logout(){
        $session = Session::getInstance();
        $session->destroy();
        $this->redirect('../login');
    }    
}
