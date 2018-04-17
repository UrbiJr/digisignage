<?php
	$action=(isset($_REQUEST['action']) ? $_REQUEST['action'] : "start");

	switch($action){
		case "start":
			$gruppo = GruppiTab::getGruppoByUtente($utente);
			$risorse = RisorseTab::getRisorseOutSeq($gruppo);
			$content = get_include_contents(CONFIG::$controllerPath.'sequenza/viewSortImg.php');
			break;
		case "sort":
			$ordinaSequenze=new OrdinaSequenze();

			//get images id and generate ids array
			$idArray=explode(",",$_POST['ids']);

			//update images order
			$ordinaSequenze->updateOrder($idArray);
			break;
		case "add":
			$gruppo = GruppiTab::getGruppoByUtente($utente);
			$sequenza = new Sequenza(0,$_POST['nOrdine'],$_POST["idRisorsa"],$gruppo->getId());
			$id = SequenzeTab::insert($sequenza);
			//response alla richesta ajax
			//echo $id;
			break;
		case "delete":

			break;
	}

?>
