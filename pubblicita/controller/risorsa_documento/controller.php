<?php

	$action=$_REQUEST['action'];

	switch ($action){
		case 'new':
			$risorse = RisorseTab::getAll();
			$content = get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewAggiungi.php");
			break;
			
		case 'add':
			$risorsa = new Risorsa(NULL, $_POST["nome"],1);
			$risorsa -> Save(); 

			$risorse = RisorseTab::getAll();
			$tmp_name = $_FILES['userfile']['tmp_name'];
			move_uploaded_file($tmp_name,CONFIG::$imgPath .$name.".jpeg");

			
			
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
