<?php

namespace App\Models;

use Core\Database;


class Cadastro{
    private $table = 'login';

    public function getAll(){
        $db = Database::getInstance();

        return $db->getList($this->table, '*');
    }
    public function getEmail($condicao){
        $db = Database::getInstance();

        return $db->getList($this->table, 'email', $condicao);
    }
    //função criada para inserir dados no banco, vai receber os dados na variável $dados 
    //nessa função vc pode fazer uma verificação para ver se foi inseridos dados, não pode receber nulo e nem vazio
    public function inserir($post = null){
        $db = Database::Getinstance();
        
       
        if($post == null && empty($post)){
            return false;
        }else{
                if( isset($post['nome']) && 
                filter_var($post['email'], FILTER_VALIDATE_EMAIL) &&
                isset($post['senha'])){

                    $post = [
                        //nome atribuito             nome do formulario
                            'nome' =>  $post['nome'],
                            'email' => filter_var($post['email'], FILTER_VALIDATE_EMAIL),
                            'senha' => password_hash($post['senha'], PASSWORD_BCRYPT, ["cost" => 10]) 
                        ];

                return $db->insert($this->table, $post);
            }
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
