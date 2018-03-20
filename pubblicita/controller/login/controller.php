<?php

//$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : "login");

switch ($action){

	case 'login':
		$content=get_include_contents(CONFIG::$controllerPath.'login/viewLogin.php');
		break;

	case 'postLogin':
		@$utente=UtentiTab::getByUtente_Password($_POST['username'],$_POST['password']);
		if($id=$utente->getId()){
			$id=$utente->getId();
			$_SESSION['id_utente']=$id;

			//include("index.php");
			$content=get_include_contents(CONFIG::$controllerPath.'login/viewHome.php');
			break;
		}else{
			echo("Login fallito, username o password non validi!");
			$action="login";
			$model="login";
			$content=get_include_contents(CONFIG::$controllerPath.'login/viewLogin.php');
		}
}
?>
