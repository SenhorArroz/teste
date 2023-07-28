<?php
use models\Logins;

class AutenticacaoController {

    function index(){
        #variáveis que serao passados para a view
        $send = [];
        #chama a view
        render("logins", $send);
    }
	function logout(){
		session_destroy();
		redirect("autenticacao");
	}

	
	
	
}
