<?php

	include("../../config/config.php");
	$action=$_REQUEST['action'];

	switch ($action){

		case 'list':
			$risorse = RisorseTab::getAll();
			//$content=get_include_contents(/*Path::$controllerPath.*/"ViewRisorse.php");
			include("ViewRisorse.php");
			break;


		case 'new':
			//$risorse = RisorseTab::getAll();
			$content = get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewAggiungi.php");
			break;

		case 'add':

			$file=basename($_FILES['file']['name']);
			$risorsa=new Risorsa(null,$file,1);
			$content = get_include_contents(CONFIG::$controllerPath."risorsa_documento/ok.php");
			
			break;

		case 'delete':

			break;

		case 'edit':
			break;

		case 'update':
			break;

		default:
			echo 'oh no';
			break;
	}

?>

