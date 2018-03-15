<?php

//$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : "login");

switch ($action){

	case 'login':
		$content=get_include_contents(CONFIG::$controllerPath.'login/viewLogin.php');
		break;
		
	case 'postLogin':
		if($utente=UtentiTab::getByUtente&Password($_POST['nome'],$_POST['password'])){
			$id=$utente->getId();
			$_SESSION['id_utente']=$id;
			include("index.php?model=view");
			break;
		}
}	
?>
