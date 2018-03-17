<?php
	session_start();
	include ('../pubblicita/config/config.php');
	//Recupera il modello sul quale si vuole lavorare
	$content="";
	//$model  = (isset($_REQUEST['model']) ? $_REQUEST['model'] : "animali");
	$model = "";

	if(!isset($_SESSION['id_utente'])){
		$model="login";
		$action="login";
	}else{
		$utente=UtentiTab::getById($_SESSION['id_utente']);
	}
	switch ($model) {
		case 'login':
			include (CONFIG::$controllerPath.'login/controller.php');
			//include (CONFIG::$templatePath.'main.php');
			break;
	}

	include (CONFIG::$templatePath.'main.php');

?>
