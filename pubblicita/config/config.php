<?php
	session_start();
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
	 * AGGIUNGERE I MODELLI MANCANTI
	 */

	require_once(CONFIG::$modelPath."DispositiviTab.php");
 	require_once(CONFIG::$modelPath."Dispositivo.php");
 	require_once(CONFIG::$modelPath."File.php");
 	require_once(CONFIG::$modelPath."FileTab.php");
 	require_once(CONFIG::$modelPath."GruppiTab.php");
 	require_once(CONFIG::$modelPath."Gruppo.php");
 	require_once(CONFIG::$modelPath."OrdinaSequenze.php");
 	require_once(CONFIG::$modelPath."Ruolo.php");
 	require_once(CONFIG::$modelPath."RuoliTab.php");
 	require_once(CONFIG::$modelPath."Risorsa.php");
 	require_once(CONFIG::$modelPath."RisorseTab.php");
 	require_once(CONFIG::$modelPath."Sequenza.php");
 	require_once(CONFIG::$modelPath."SequenzeTab.php");
 	require_once(CONFIG::$modelPath."Utente.php");
 	require_once(CONFIG::$modelPath."UtentiTab.php");
 	require_once(CONFIG::$modelPath."Azienda.php");
 	require_once(CONFIG::$modelPath."AziendeTab.php");
	require_once(CONFIG::$libPath."lib.php");



?>
