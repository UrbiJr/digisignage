<?php
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$action=$_REQUEST['action'];
	switch ($action){
		case 'new':
			$content=get_include_contents(CONFIG::$controllerPath."risorsa_immagine/FormAggiungi.php");
			break;
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
			$content=get_include_contents(CONFIG::$controllerPath."risorsa_immagine/ViewRisorse.php");
			break;
			
		default:
			echo 'oh no';
			break;
	}

?>
