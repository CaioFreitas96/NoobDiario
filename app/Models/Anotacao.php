<?php

namespace App\Models;

use Core\Database;

class Anotacao{
    private $table = 'diario';

    public function getAll(){
        $db = Database::getInstance();

        return $db->getList($this->table, 'anotacao, dia');
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
}