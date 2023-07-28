<?php
use models\Logins;

class MenuController {

	function __construct() {
		#se nao existir é porque nao está logado
		if (!isset($_SESSION["user"])){
			redirect("autenticacao");
			die();
		}
		#proibe o usuário de entrar caso não tenha autorização
		if ($_SESSION['user']['tipo'] < Logins::ADMIN_USER){
			header("HTTP/1.1 401 Unauthorized");
			die();
		}
	}
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];
	
		#chama a view
		render("menu", $send);
	}

	
	




}
