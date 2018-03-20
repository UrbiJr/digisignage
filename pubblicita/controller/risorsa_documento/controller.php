<?php

	$action=$_REQUEST['action'];
	$file=$_REQUEST['file'];
	switch ($action){
		case 'add':
			$risorsa=new Risorsa(null,basename($file),1);
			$risorsa->save();
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
