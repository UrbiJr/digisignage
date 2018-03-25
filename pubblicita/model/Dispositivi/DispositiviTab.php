<?php

class DispositiviTab{

	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM Dispositivi WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Dispositivo($row['indirizzoMac'],$row['indirizzoIp'],$row['nome'],$row['orientamento'],$row['idGruppo']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM Dispositivi");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$dispositivi = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$dispositivo= new Dispositivo($row['id'],$row['indirizzoMac'],$row['indirizzoIp'],$row['nome'],$row['orientamento'],$row['idGruppo']);
				$dispositivi[$row['id']]=$dispositivo;
			}
			return $dispositivi;
		}else{
			return null;
		}
	}

	/* Ritorna dispositivo con indirizzoMac = $indirizzoMac */
	public static function getByIndirizzoMac($indirizzoMac) {
		$query = sprintf("SELECT * FROM Dispositivi WHERE indirizzoMac = '%s'",$indirizzoMac);
		$result = DBCONNECTION::$con->query($query);
		if($result){
			$row = $result->fetch_assoc();
			$dispositivo= new Dispositivo($row['id'],$row['indirizzoMac'],$row['indirizzoIp'],$row['nome'],$row['orientamento'],$row['idGruppo']);
			return $dispositivo;
		}
		return null;
	}


	public static function remove($dispositivo){
		$query=sprintf("DELETE FROM Dispositivi WHERE id = %d ", $dispositivo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($dispositivo){
		$query=sprintf("INSERT INTO Dispositivi (indirizzoMac,indirizzoIp,nome,orientamento,idGruppo) VALUES('%s','%s','%s','%s',%d)",$dispositivo->getIndirizzoMac(),$dispositivo->getIndirizzoIp(),$dispositivo->getNome(),$dispositivo->getOrientamento(),$dispositivo->getIdGruppo());
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($dispositivo){
		$query=sprintf("UPDATE Dispositivi SET indirizzoMac='%s', indirizzoIp='%s', nome='%s', orientamento='%s', idGruppo=%d WHERE id=%d",$dispositivo->getIndirizzoMac(),$dispositivo->getIndirizzoIp(),$dispositivo->getNome(),$dispositivo->getOrientamento(),$dispositivo->getIdGruppo(),$dispositivo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function getGruppo($dispositivo){
		$query=sprintf("SELECT * FROM Gruppi WHERE id=%d",$dispositivo->getIdGruppo());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$gruppo= new Gruppo($row['id'],$row['sigla'],$row['descrizione'],$row['idAzienda']);
			}
			return $gruppo;
		}else{
			return null;
		}
	}

	/*	restituisce lo zip di files che spetta al dispositivo ($dispositivo)
		in base al gruppo di appartenenza
		restituisce null in caso di errore*/
	public static function createZipForDevice($dispositivo) {
		$totalFiles = array();
		$risorse = GruppiTab::getRisorse($dispositivo->getGruppo());
		// ciclo sulle risorse
		foreach ($risorse as $risorsa) {
			$filesPerResource = RisorseTab::getFiles($risorsa);
			// ciclo sui file (per ogni risorsa)
			foreach ($filesPerResource as $f) {
				// estraggo il percorso del file
				$path = $f->getPath();
				// controllo se il file esiste
				if (file_exists($path))
					$totalFiles[] = $path;
				else {
					echo "file ".$f->getNome()." non esistente";
					return null;
				}
			}
		}

		/* creo zip che contiene $totalFiles... */
		$zip = new ZipArchive();
		$filename = "./" . $dispositivo->getIdGruppo() . ".zip";
		// zip gia' presente, apri in modalita' overwrite
		if (file_exists($filename)) {
			if ($zip->open($filename, ZipArchive::OVERWRITE)!==TRUE) {
	    		//exit("cannot open <$filename>\n");
				return null;
			}
		// altrimenti, apri in modalita' create
		}else if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    			//exit("cannot open <$filename>\n");
				return null;
		}
		// aggiungi ciascun file ad archivio zip
		foreach ($totalFiles as $k => $file) {
			/*	ZipArchive::addFile($percorsoFile, $nuovoNomeFile)
				$nuovoNomeFile (opzionale) -> nuovo nome del file dentro
				l'archivio zip */
			//$zip->addFile($file, "/" . $k . $file->getTipo());
			$zip->addFile($file, $file);
			echo "numfiles: " . $zip->numFiles . "\n";
			echo "status:" . $zip->status . "\n";
		}
		$zip->close();
		return $filename;
	}

}
