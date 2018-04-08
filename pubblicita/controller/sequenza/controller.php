<?php
	$action=(isset($_REQUEST['action']) ? $_REQUEST['action'] : "start");

	switch($action){
		case "start":
			$content=get_include_contents(CONFIG::$controllerPath.'sequenza/viewSortImg.php');
			break;
		case "sort":
			$ordinaSequenze=new OrdinaSequenze();

			//get images id and generate ids array
			$idArray=explode(",",$_POST['ids']);

			//update images order
			$ordinaSequenze->updateOrder($idArray);
			break;
	}

?>
