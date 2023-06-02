<?php

namespace models;

class Servidores extends Model {

    protected $table = "servidor";
    #nao esqueça da ID
    protected $fields = ["id","nome","id_jogo"];
    
    public function getMembros($idServidor){
        $sql = "SELECT * FROM logins
            INNER JOIN membros ON
                logins.id = membros.id_login
            WHERE membros.id_servidor = :idServidor ";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idServidor' => $idServidor]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }
        return $list;
    }
    public function getJogo($idJogo){
        $sql = "SELECT * FROM jogos
            INNER JOIN servidor ON
                jogos.id = servidor.id_jogo
            WHERE servidor.id_jogo = :idJogo ";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idJogo' => $idJogo]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }
        return $list;
    }
    public function all(){
        $sql = "SELECT servidor.*, jogos.nome as nomeJogo FROM {$this->table} "
        ." LEFT JOIN jogos ON jogos.id = servidor.id_jogo ";

        
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

