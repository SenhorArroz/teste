<?php

namespace models;

class Jogos extends Model {

    protected $table = "jogos";
    #nao esqueça da ID
    protected $fields = ["id","nome","id_categoria"];
    
    public function findById($id){
        $sql = "SELECT jogos.*, categoria.nome AS categoria FROM {$this->table} "
                ." LEFT JOIN categoria ON categoria.id = jogos.id_categoria "
                ." WHERE categoria.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT jogos.*, categoria.nome AS categoria FROM {$this->table} "
        ." LEFT JOIN categoria ON categoria.id = jogos.id_categoria ";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }
        return $list;
    }

}

