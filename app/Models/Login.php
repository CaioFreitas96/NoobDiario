<?php

namespace App\Models;

use Core\Database;
    
class Login {
    private $table = "login";

    
    public function getAll($condicao){
        $db = Database::getInstance();
        
             return $db->getList($this->table, 'email, senha', $condicao);
    }    
    

    public function login($email, $senha){
        $db = Database::getInstance();
        
        $login = $db->getList($this->table, '*',  ['email' => $email]);
        
        
        if(isset($login[0]['email'])){
           
            $login = $login[0];       
                        
                if(password_verify($senha, $login['senha'])){
                   
                    unset($login['senha'], $login['cpf']);
                    return $login;
                        
                }else{
                    return false;
                }
          
        }else{
                return "email invalido";
        }   

    }
    
    //função criada para inserir dados no banco, vai receber os dados na variável $dados 
    //nessa função vc pode fazer uma verificação para ver se foi inseridos dados, não pode receber nulo e nem vazio
    public function inserir($dados){
        $db = Database::Getinstance();
        
        if($dados == null && empty($dados)){
            return false;
        }else{
            return $db->insert($this->table, $dados);
        }
    }
    public function atualizar($dados, $condicao){
        $db = Database::getInstance();
         
        return $db->update($this->table, $dados, $condicao );
    }

    // essa condição significa se não passa nada, ele não altera nada.
    public function deletar($id = null){
        $db = Database::getInstance();
        if($id != null && !empty($id)){
            $condicao = ["id" => $id];
            return $db->delete($this->table, $condicao);
        }    
        return false;
    }
}

