<?php
	define("ROOTPATH",     "/home/ITIS-EMATTEI.LOCAL/s_grsgcm99h28g479w/projectWork/application/");

	class CONFIG{
		public static $modelPath =  ROOTPATH . "model/";
		public static $controllerPath =  ROOTPATH . "controller/";
		public static $libPath =  ROOTPATH . "lib/";
		public static $templatePath =  ROOTPATH . "template/";
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
	//include (CONFIG::$modelPath . 'AnimaliRec.php');
	//include (CONFIG::$modelPath . 'AnimaliTab.php');
	//include (CONFIG::$modelPath . 'PersoneRec.php');
	//include (CONFIG::$modelPath . 'PersoneTab.php');
?>
