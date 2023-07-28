<?php
use models\Logins;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class RegistroController {

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/logins/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Logins();
		$send['tipoUser'] = Logins::$userTypes;
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}
		#chama a view
		render("registro", $send);
	}


	function create(){
        $send = [];
        $model = new Logins;

		#validacao
		$requeridos = ["nome"=>"Nome é obrigatório",
		"email"=>"email é obrigatório",
		"senha"=>"senha é obrigatório"];
		foreach($requeridos as $field=>$msg){
			#verifica se o campo está vazio
			if (!validateRequired($_POST,$field)){
				setValidationError($field, $msg);
			}
		}
		#se alguma validação tiver falhado
		if (count($_SESSION['errors'])){
			setFlash("error","Falha ao salvar usuário.");
			#volta para a página que estava
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			die();
		}	
    
        if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["tipo"])){
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha =  $_POST["senha"];
			$tipo =  $_POST["tipo"];
        }else{
            $nome = "";
            $email = "";
            $senha =  "";
            $tipo =  "";
        }

        $result = $model->createProfile($nome, $email, hash('sha256', $senha), $tipo);
        $result = preg_replace('/\s*\[\s*["a-z]+\([0-9]+\)\]\s*/', '', print_r($send['data'], true));
        $send['data'] = $result;  
    
        if($result != null){
            $_SESSION = $send['data'];
			setFlash("success","Salvo com sucesso.");
            redirect("registro"); 
        } else {
            redirect("logins?new");
        }
    }


}
