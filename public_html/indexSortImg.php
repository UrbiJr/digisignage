<?php
	$action=(isset($_REQUEST['action']) ? $_REQUEST['action'] : "start");

	switch($action){
		case "start":
			include("viewSortImg.php");
			break;
		case "sort":
			include("orderUpdate.php");
			break;
	}

?>
