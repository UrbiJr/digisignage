<?php
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include("../config/config.php");
	include("../model/Risorsa.php");
	include("../model/RisorseTab.php");
	include("../model/File.php");
	include("../model/FileTab.php");

	$action=$_REQUEST['action'];
	switch ($action){
		case 'new':
			$content=get_include_contents(/*Path::$controllerPath.*/"FormAggiungi.php");
		case 'add':
			$file=basename($_FILES['file']['name']);
			$risorsa=new Risorsa(null,$file,1);
			$risorsa->save();
			break;
		
		case 'delete':
			
			break;
		
		case 'edit':
			break;

		case 'update':
			break;	
			
		case 'list':
			$risorse = RisorseTab::getAll();
			//$content=get_include_contents(/*Path::$controllerPath.*/"ViewRisorse.php");
			include("ViewRisorse.php");
			break;
			
		default:
			echo 'oh no';
			break;
	}

?>
