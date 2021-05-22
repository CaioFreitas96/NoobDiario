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
           
            if($validacao == false){
                $this->view('login', ['validacao' => $validacao, 'email' => $email]);
            }else{

                $email =  $request->post('email'); 
                $senha =  $request->post('senha');
                $login = $loginModel->login($email, $senha);
                
                               
                if(empty($request->post('senha'))){

                    $this->view('login', [ 'email' => $email, 'senhaVazia' => 'senhaVazia', 'login' => $login]);
               
                }else if($login === "email invalido"){
                   
                    $this->view('login', ['email' => $email, 'login' => $login]);
                    
                }else if($login == false){
                   
                    $this->view('login', ['email' => $email, 'login' => $login]);
                    
                }else{
                    
                    $session = Session::getInstance();
                    $session->set('login', $login);
                    $anotacaoModel = new Anotacao();
                    $anotacao = $anotacaoModel->getAll();
                    $view = ['login' => $login, 'anotacao' => $anotacao ];
                    $this->view('diario', $view);
                }
            }   
        }
    }    

   
}
