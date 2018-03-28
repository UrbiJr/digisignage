<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	//include("../../config/config.php");
	$action=$_REQUEST['action'];

	$action=$_REQUEST['action'];
	switch ($action){
		case 'new':
			$content=get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewAggiungi.php");
			break;
			
		case 'add':
			$file=basename($_FILES['file']['name']);
			$risorsa=new Risorsa(null,$file,1);
			$risorsa->save();
			$content = get_include_contents(CONFIG::$controllerPath."risorsa_documento/ok.php");
			break;

		case 'delete':
			break;

		case 'edit':
			break;

		case 'update':
			break;

		case 'list':
			$risorse = RisorseTab::getAll();
			$content=get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewRisorse.php");
			break;

		default:
			echo 'oh no';
			break;
	}

?>
