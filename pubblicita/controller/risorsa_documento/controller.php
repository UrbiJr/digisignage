<?php

	$action=$_REQUEST['action'];

	switch ($action){
		case 'new':
			//$risorse = RisorseTab::getAll();
			$content = get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewAggiungi.php");
			break;

		case 'add':


			$risorsa = new Risorsa(NULL, $_POST['nome'],1);

			$risorsa -> save();

			//$risorse = RisorseTab::getAll();
			$tmp_name = $_FILES['userfile']['tmp_name'];
			move_uploaded_file($tmp_name,CONFIG::$imagesPath .$_POST['nome'].".jpeg");
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
