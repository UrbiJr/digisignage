<?php
	@session_start();

	include ('../pubblicita/config/config.php');
	//Recupera il modello sul quale si vuole lavorare
	$content="";
	//$model  = (isset($_REQUEST['model']) ? $_REQUEST['model'] : "animali");
	@$model = $_REQUEST['model'];
	@$action = $_REQUEST['action'];
	if(!$_SESSION['id_utente']){
		if(is_null($_REQUEST['action']) || is_null($_REQUEST['model'])){
			$model="login";
			$action="login";
		}
	}else{
		if(!@$_REQUEST['action'] || !@$_REQUEST['model']){
			$model="login";
			$action="login";
		}else{
			$model = $_REQUEST['model'];
			$action = $_REQUEST['action'];
			$utente=UtentiTab::getById($_SESSION['id_utente']);
		}
	}

	switch ($model) {
		case 'login':
			include (CONFIG::$controllerPath.'login/controller.php');
			//include (CONFIG::$templatePath.'main.php');
			break;
	}

	include (CONFIG::$templatePath.'main.php');

?>
