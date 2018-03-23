<?php

//$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : "login");

switch ($action){

	case 'login':
		//include (CONFIG::$controllerPath.'login/viewLogin.php');
		$content=get_include_contents(CONFIG::$controllerPath.'login/viewLogin.php');
		break;
	case'home':
		$content=get_include_contents(CONFIG::$controllerPath.'login/viewHome.php');
		break;

	case 'postLogin':
		@$utente=UtentiTab::getByUtente_Password($_POST['username'],$_POST['password']);
		if($id=$utente->getId()){
			$_SESSION['id_utente']=$id;

			//include("index.php");
			$content=get_include_contents(CONFIG::$controllerPath.'login/viewHome.php');
			break;

		}else{
			$error="Login fallito, username o password non validi!";
			echo($error);
			$action="login";
			$model="login";
			$content=get_include_contents(CONFIG::$controllerPath.'login/viewLogin.php');
		}
		case 'logout':
				session_destroy();
				$content=get_include_contents(CONFIG::$controllerPath.'login/viewLogin.php');
				include (CONFIG::$templatePath.'templateLogin.php');

			break;

}
?>
