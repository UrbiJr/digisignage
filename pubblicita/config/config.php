<?php
	define("ROOTPATH", __DIR__."/../../");


	class CONFIG{
		public static $modelPath =  ROOTPATH . "pubblicita/model/";
		public static $controllerPath =  ROOTPATH . "pubblicita/controller/";
		public static $libPath =  ROOTPATH . "pubblicita/lib/";
		public static $templatePath =  ROOTPATH . "pubblicita/template/";
		public static $imagesPath =  ROOTPATH . "public_html/images/";
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

	include(CONFIG::$modelPath."UtentiTab.php");
	include(CONFIG::$libPath."lib.php");
	include(CONFIG::$modelPath."Utente.php");
	include(CONFIG::$modelPath."Gruppo.php");
	include(CONFIG::$modelPath."GruppiTab.php");
	include(CONFIG::$modelPath."Ruolo.php");
	include(CONFIG::$modelPath."RuoliTab.php");
	include(CONFIG::$modelPath."Risorsa.php");
	include(CONFIG::$modelPath."RisorseTab.php");
	include(CONFIG::$modelPath."File.php");
	include(CONFIG::$modelPath."FileTab.php");
	include(CONFIG::$modelPath."Dispositivi/DispositiviTab.php");
	include(CONFIG::$modelPath."Dispositivi/Dispositivo.php");
	include(CONFIG::$controllerPath."sequenza/Controller.php");

?>
