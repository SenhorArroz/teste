<?php
use models\Servidores;
use models\Jogos;
use models\Logins;
use models\Membros;
/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class ServidoresController {

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/logins/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Servidores();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		#recupera a lista com todos os jogos
        $jogoModel = new Jogos();
        $send['jogos'] = $jogoModel->all();

		#recupera a lista com todos os logins
        $logModel = new Logins();
        $send['nomes'] = $logModel->all();

		#se estiver editando um servidor
        if ($id != null){
            #recupera todos os membrods já setados para esse servidor
            $send['membros'] = $model->getMembros($id);
        }
		if ($id != null){
            $send['jogoNome'] = $model->getJogo($id);
        }
		 #$send['id_categoria'] = [0=>"Escolha uma opção", 1=>"Jogos", 2=>"Filmes"];

		#chama a view
		render("servidores", $send);
	}

	
	function salvar($id=null){

		$model = new Servidores();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		 #se a id de um login/membro tiver sido enviada
		 if (_v($_POST,'id_membros')){
            $model = new Membros();
            $dados = ["id_login"=> $_POST['id_membros'], "id_servidor"=>$id];
            $model->save($dados);
        }


		
		redirect("servidores/index/$id");
	}

	function deletar(int $id){
		
		$model = new Servidores();
		$model->delete($id);

		redirect("servidores/index/");
	}
	function deletarMembro(int $idDoRelacionamento){
       
        $model = new Membros();
        $rel = $model->findById($idDoRelacionamento);
        $model->delete($idDoRelacionamento);

        redirect("servidores/index/{$rel['id_servidor']}");
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
