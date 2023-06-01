<?php

namespace models;

class Servidores extends Model {

    protected $table = "servidor";
    #nao esqueça da ID
    protected $fields = ["id","nome","id_jogo"];
    
    
    
}

