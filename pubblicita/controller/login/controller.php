<?php

//$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : "login");

switch ($action){

	case 'login':
		//include (CONFIG::$controllerPath.'login/viewLogin.php');
		$content=get_include_contents(CONFIG::$controllerPath.'login/viewLogin.php');
		break;
	/*
	case 'home':
		$content=get_include_contents(CONFIG::$controllerPath.'login/viewHome.php');
		break;
	*/

	case 'postLogin':
		/* 	PER L'UTENTE CON ID 1 LA PASSWORD NON CRIPTATA E' password
			PER L'UTENTE CON ID 4 LA PASSWORD NON CRIPTATA E' miapassword */
		@$utente=UtentiTab::postLogin($_POST['username'],$_POST['password']);

		// se utente non null, e se id non null
		if($utente && $id=$utente->getId()){
			$_SESSION['id_utente']=$id;

			$error=false;
			//include("index.php");
		$content=get_include_contents(CONFIG::$controllerPath.'login/viewHome.php');
			break;

		}else{
			$error=true;
			//$error="Login fallito, username o password non validi!";
			//echo($error);
			$action="login";
			$model="login";
		}
		case 'logout':
			session_destroy();
			$content=get_include_contents(CONFIG::$controllerPath.'login/viewLogin.php');
			break;

}
?>
