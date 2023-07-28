<?php

class TelaPrincipalController {
	

	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];
	
		#chama a view
		render("telaprincipal", $send);
	}
}
