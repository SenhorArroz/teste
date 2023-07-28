<?php
use models\Jogos;
use models\Categoria;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class JogosController {

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/logins/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Jogos();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		#recupera a lista com todos os modelos
        $categoriaModel = new Categoria();
        $send['categoria'] = $categoriaModel->all();


		 #$send['id_categoria'] = [0=>"Escolha uma opção", 1=>"Jogos", 2=>"Filmes"];

		#chama a view
		render("jogos", $send);
	}

	
	function salvar($id=null){

		$model = new Jogos();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("jogos/index/$id");
	}

	function deletar(int $id){
		
		$model = new Jogos();
		$model->delete($id);

		redirect("jogos/index/");
	}
	#construtor, é iniciado sempre que a classe é chamada
	function __construct() {
		#se nao existir é porque nao está logado
		if (!isset($_SESSION["user"])){
			redirect("autenticacao");
			die();
		}
	}



}
