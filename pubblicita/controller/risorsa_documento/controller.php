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
	$file=$_REQUEST['file'];
	switch ($action){
		case 'add':
			$risorsa=new Risorsa(null,basename($file),1);
			$risorsa->save();
			$risorsa->saveToDatabase();
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
