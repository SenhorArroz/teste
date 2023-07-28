<?php

namespace models;

class Logins extends Model {

    protected $table = "logins";
    #nao esqueça da ID
    protected $fields = ["id","nome", "email","senha"];
    
    const COMUM_USER = 1;
    const ADMIN_USER = 5;

    public static $userTypes = [Logins::COMUM_USER=>"Usuário comum",
                                Logins::ADMIN_USER=>"Admin"];

    
    public function findLogin($email, $senha){
        $sql = "SELECT * FROM {$this->table} "
                ." WHERE email = ? and senha = ?";        

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        /*print_r($row);
        die();*/

        if ($row != '') {
        return $row;
    } else {
        return '';
    }
    }
                                
    function createProfile($name, $email, $senha, $tipo){

        $sql = "INSERT INTO logins (nome, email, senha, tipo) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $email, $senha, $tipo);
        $stmt->execute();

        //cria um diretorio para cada usuario cadastrado
        $dirProf = 'app/profiles/' . $name;
        $dirArqs = 'app/profiles/' . $name . "/profileArqs";
        if (!file_exists($dirPath)) {
            mkdir($dirProf, 0777, true);
            mkdir($dirArqs, 0777, true);
        }
        
        if($stmt == false){
            redirect('logins?new');
            return false;
        }else{
            redirect('logins');
            return true;
        }
    }
    


    #sobrescreve a funcao salve da classe mae Model
    public function save($data){
        if (_v($data,"senha") != ""){
            $data["senha"] = hash("sha256", $data["senha"]);
        } else
        if (_v($data,"senha") == ""){
            #caso a senha nao seja enviada
            #remove do data, para que nao seja alterada
            #a senha anterior que já está salva
            unset($data["senha"]);
        }
        #chama a funcao save original da classe mae
        return parent::save($data);
    }
    public function update($id, $data){
        if (_v($data,"senha") != ""){
            $data["senha"] = hash("sha256", $data["senha"]);
        } else
        if (_v($data,"senha") == ""){
            unset($data["senha"]);
        }
        return parent::update($id, $data);
    }
        
}

