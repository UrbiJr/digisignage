<?php

<<<<<<< HEAD
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
=======
	include("../../config/config.php");
	$action=$_REQUEST['action'];
>>>>>>> c0709f093467c0d0ad2ecd000448b14cc4c4fb8e

	$action=$_REQUEST['action'];
	switch ($action){
		case 'new':
			$content=get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewAggiungi.php");
			break;
		case 'add':
<<<<<<< HEAD
			$file=basename($_FILES['file']['name']);
			$risorsa=new Risorsa(null,$_POST['filename'],1);
			$risorsa->save();
=======

<<<<<<< HEAD
			$file=basename($_FILES['file']['name']);
			$risorsa=new Risorsa(null,$file,1);
=======
			$file=basename($_FILES['file']['filename']);
			$risorsa=new Risorsa($_GET['filename'],$file,1);
			$risorsa->save();
>>>>>>> 957a6b9d96323c5a082cad4deeb45e09ce7311ff
			$content = get_include_contents(CONFIG::$controllerPath."risorsa_documento/ok.php");

>>>>>>> c0709f093467c0d0ad2ecd000448b14cc4c4fb8e
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
