<?php
use models\Logins;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class LoginsController {

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/logins/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Logins();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		# $send['tipos'] = [0=>"Escolha uma opção", 1=>"Usuário comum", 2=>"Admin"];

		#chama a view
		render("logins", $send);
	}

	
	function login(){
        $send = [];
        $model = new Logins;
    
        if(isset($_POST["email"]) && isset($_POST["senha"])){
            $email = $_POST["email"];
            $senha =  $_POST["senha"];
        }else{
            $email = "";
            $senha =  "";
        }
        
        $result = $model->findLogin($email, hash('sha256', $senha));
        $send['data'] = $result;
        $result = preg_replace('/\s*\[\s*["a-z]+\([0-9]+\)\]\s*/', '', print_r($send['data'], true));
    
        if($result != null){
            $_SESSION['user'] = $send['data'];
            redirect("telaprincipal"); 
        } else {
            redirect("logins");
        }
    }


}
