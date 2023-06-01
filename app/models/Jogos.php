<?php

namespace models;

class Jogos extends Model {

    protected $table = "jogos";
    #nao esqueça da ID
    protected $fields = ["id","nome","id_categoria"];
    
    
    
}

