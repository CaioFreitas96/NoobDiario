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
                isset($post['senha']) && isset($post['cpf']) && isset($post['telefone'])){

                    $post = [
                        //nome atribuito             nome do formulario
                            'nome' =>  $post['nome'],
                            'email' => filter_var($post['email'], FILTER_VALIDATE_EMAIL),
                            'senha' => password_hash($post['senha'], PASSWORD_BCRYPT, ["cost" => 10]),
                            'cpf' => $post['cpf'],
                            'telefone' => $post['telefone']
                              

                        ];

                return $db->insert($this->table, $post);
            }
        }
    }
    
    function validaCPF($cpf) {

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }
    function validaTelefone($tel){
        $numero = is_numeric($tel);
        if($numero == true){
            if(strlen($tel) > 9 && strlen($tel) < 12){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}
