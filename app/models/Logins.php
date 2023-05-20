<?php

namespace models;

class Logins extends Model {

    protected $table = "logins";
    #nao esqueça da ID
    protected $fields = ["id","nome","email","senha"];
    
    
    
}

