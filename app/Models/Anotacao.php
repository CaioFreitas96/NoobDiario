<?php

namespace App\Models;

use Core\Database;

class Anotacao{
    private $table = 'diario';

    public function getAll($user){
        $db = Database::getInstance();

        return $db->getList($this->table, 'id, anotacao, dia', ['nome_login' => $user], null, 'dia DESC');
    }
    public function getId($id){
        $db = Database::getInstance();

        $data = $db->getList($this->table, '*', ['id' => $id] );

        return $data[0];
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
    public function deletar($condicao){
        
        $db = Database::Getinstance();
        if($condicao == null){
            return false;
        }else{
            return $db->delete($this->table, ['id' => $condicao]);
        }
    }
    public function atualizar($dados, $condicao){
        $db = Database::getInstance();
         
        return $db->update($this->table, $dados, ['id' => $condicao]);
    }
}