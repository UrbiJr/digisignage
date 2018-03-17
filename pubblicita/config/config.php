<?php
	define("ROOTPATH", __DIR__."/../../");
	
	class CONFIG{
		public static $modelPath =  ROOTPATH . "pubblicita/model/";
		public static $controllerPath =  ROOTPATH . "pubblicita/controller/";
		public static $libPath =  ROOTPATH . "pubblicita/lib/";
		public static $templatePath =  ROOTPATH . "pubblicita/template/";
	}

	class DBCONNECTION{
		public static $con;
	}

	DBCONNECTION::$con = new mysqli ("10.0.0.102","amministratore","DigitalSignage","pubblicita");
	if(!DBCONNECTION::$con){
		die("Could not connect: ". $con->connect_error());
	}

	/*
	 * Creazione tabella di TEST
	 */
	
	
	/*
	 * Include delle librerie e dei modelli
	 */

	include (CONFIG::$libPath . 'lib.php');

?>
