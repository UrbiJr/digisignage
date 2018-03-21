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

	/* restituisce lo zip di files che spetta al dispositivo ($dispositivo)
		in base al gruppo di appartenenza
		- da testare */
	public static function createZipForDevice($dispositivo) {
		$totalFiles = array();
		$risorse = GruppiTab::getRisorse($dispositivo->getGruppo());
		foreach $risorse as $risorsa {
			$filesPerResource = RisorseTab::getFiles($risorsa);
			foreach $filesPerResource as $f {
				$totalFiles[] = $f;
			}
		}

		/* creare zip da $totalFiles... */
	}

}
