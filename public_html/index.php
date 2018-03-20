<?php
	session_start();

	include ('../pubblicita/config/config.php');
	//Recupera il modello sul quale si vuole lavorare
	$content="";

	if (isset($_REQUEST['model'])) {
		$model = $_REQUEST['model'];
	}else {
		$model = "login";		//settate il default
	}

	if (isset($_REQUEST['action'])) {
		$action = $_REQUEST['action'];
	}else {
		$action = "login";	//settate il default
	}

	if (isset($_SESSION['id_utente'])){
			$utente=UtentiTab::getById($_SESSION['id_utente']);
	}else	if(!isset($_SESSION['id_utente']) && $action!='postLogin' ){
			$model="login";
			$action="login";
	}



	switch ($model) {
		case 'login':
			include (CONFIG::$controllerPath.'login/controller.php');
			//include (CONFIG::$templatePath.'main.php');
			break;
	}

	if($action=='login' && $model=='login'){
		include (CONFIG::$templatePath.'templateLogin.php');
	}else{
		include (CONFIG::$templatePath.'main.php');
	}

?>
