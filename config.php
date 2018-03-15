<?php

	class DBCONNECTION{
		public static $con;
	}

	class Path {
		
		public static $modelPath = "/home/ITIS-EMATTEI.LOCAL/s_lbntms99e04g479p/veterinario/model/";
		public static $controllerPath = "/home/ITIS-EMATTEI.LOCAL/s_lbntms99e04g479p/veterinario/controller/";
		public static $libPath = "/home/ITIS-EMATTEI.LOCAL/s_lbntms99e04g479p/veterinario/lib/";
		public static $templatePath = "/home/ITIS-EMATTEI.LOCAL/s_lbntms99e04g479p/veterinario/template/";

	}

	//connessione al dbms
	DBCONNECTION::$con = new mysqli("10.0.0.102","amministratore","DigitalSignage","pubblicita");
	if(!DBCONNECTION::$con){
		die("Could not connect : " . $mysqli->connect_error());
	}
?>
