<?php

	/* 	includi una sola volta il config.php, su cui e' presente session_start
		e che quindi verra' eseguito una sola volta */
	require_once ('../pubblicita/config/config.php');
	//Recupera il modello sul quale si vuole lavorare

	$content="";
	$error="";
	if (isset($_REQUEST['model'])) {
		$model = $_REQUEST['model'];
	}else {
		$model = "login";		//settato il default
	}

	if (isset($_REQUEST['action'])) {
		$action = $_REQUEST['action'];
	}else {
		$action = "login";		//settato il default
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
			break;

		case 'risorsa_documento':
			include (CONFIG::$controllerPath.'risorsa_documento/controller.php');
			break;
		/*case 'risorsa_immagine':
			include (CONFIG::$controllerPath.'risorsa_immagine/Controller.php');
			break;
		*/

		// modello ordinamento immagini sequenza
		case 'sequenza':
			include (CONFIG::$controllerPath.'sequenza/controller.php');
			break;
	}

	if(($action=='login' && $model=='login') || ($action=='logout' && $model=='login') ){
		include (CONFIG::$templatePath.'templateLogin.php');
	}else{
		include (CONFIG::$templatePath.'main.php');
	}

?>
