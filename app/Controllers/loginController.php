<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Login;
use Core\Request;

class LoginController extends Controller {
    
    public function index() {
        
        $texto = "Noobframework da URL: localhost:8080/login";

        $loginModel = new Login();
        

        
        
        
        $view = ['texto' => $texto];
        //o segundo parâmetro da
        $this->view('login', $view);
    }    

   
}
