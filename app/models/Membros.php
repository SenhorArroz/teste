<?php

namespace models;

class Membros extends Model {

    protected $table = "membros";
    #nao esqueça da ID
    protected $fields = ["id","id_login","id_servidor"];
    
    
    
}