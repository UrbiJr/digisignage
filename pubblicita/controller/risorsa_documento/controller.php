<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	//include("../../config/config.php");
	$action=$_REQUEST['action'];
	switch ($action){
		case 'new':
			$content=get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewAggiungi.php");
			break;
		case 'add':
			$target_dir = "/tmp/";
			$error="";
			if($_FILES['file']['tmp_name']){
				
				$target_file = $target_dir . basename($_FILES['file']['tmp_name']);
				//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				//echo($_FILES["file"]["tmp_name"]);
				define("TEMP_NAME",$_FILES["file"]["tmp_name"]);
				if (!(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))) {
					echo("Failed to upload.");
				}
				$info= explode(".", basename($_FILES['file']['name']));
				$info[1] = strtolower ($info[1]);
				if($info[1] === "pdf" || $info[1] === "jpeg" || $info[1] === "jpg" || $info[1] === "png"){
					$date=date("Y-m-d H:i:s");
					$risorsa=new Risorsa(null,basename($_FILES['file']['name']),$date,$utente->getIdAzienda());
					$risorsa->save();
					$content = get_include_contents(CONFIG::$controllerPath."risorsa_documento/fileUploaded.php");
				}else{
					$error="Estensione non supportata!";
					$content=get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewAggiungi.php");
				}
			}else{
				$error="Nessun file selezionato!";
				$content=get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewAggiungi.php");
			}
			break;
		case 'delete':
			$risorsa=RisorseTab::getById($_GET['id']);
			$risorsa->delete();
			$risorse=RisorseTab::getRisorseByUtente($utente);
			$content=get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewRisorse.php");
			break;
		case 'edit':
			break;
		case 'update':
			break;
		case 'list':
			$risorse = RisorseTab::getRisorseByUtente($utente);
			$content=get_include_contents(CONFIG::$controllerPath."risorsa_documento/ViewRisorse.php");
			break;
		default:
			echo 'oh no';
			break;
	}
	
	
?>
