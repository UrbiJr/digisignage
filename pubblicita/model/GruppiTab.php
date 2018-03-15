<?php

class GruppiTab{
	private $gruppi = array();

	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM Gruppi WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Gruppo($row['id'],$row['sigla'],$row['descrizione'],$row['idAzienda']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM Gruppi");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$gruppi = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$gruppo[$row['id']]= new Gruppo($row['id'],$row['sigla'],$row['descrizione'],$row['idAzienda']);
			}
			return $gruppo;
		}else{
			return null;
		}
	}


	public static function remove($gruppo){
		$query=sprintf("DELETE FROM Gruppi WHERE id = %d ", $gruppo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($gruppo){
		$query=sprintf("INSERT INTO Gruppi (sigla,descrizione,idAzienda) VALUES('%s','%s',%d)",$gruppo->getSigla(),$gruppo->getDescrizione(),$gruppo->getIdAzienda());
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($gruppo){
		$query=sprintf("UPDATE gruppi SET sigla='%s', descrizione='%s', idAzienda=%d WHERE id=%d",$gruppo->getSigla(),$gruppo->getDescrizione(),$gruppo->getIdAzienda(),$gruppo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function getAzienda($gruppo){
		$query=sprintf("SELECT * FROM Azienda WHERE id=%d",$gruppo->getIdAzienda());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$azienda= new Azienda($row['id'],$row['ragioneSociale']);
			}
			return $azienda;
		}else{
			return null;
		}
	}
	
	public static function getDispositivi($gruppo){
		$query=sprintf("SELECT * FROM Dispositivi WHERE idGruppo = %d", $gruppo->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$dispositivi = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$dispositivi[$row['id']]= new Dispositivo($row['indirizzoMac'],$row['indirizzoIp'],$row['nome'],$row['orientamento'],$row['idGruppo']);
			}
			return $dispositivi;
		}else{
			return null;
		}
	}
	
	public static function getSequenza($gruppo){
		$query=sprintf("SELECT * FROM Sequenze WHERE idGruppo=%d",$gruppo->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$sequenza= new Sequenza($row['id'],$row['nOrdine'],$row['idRisorsa'],$row['idGruppo']);
			}
			return $sequenza;
		}else{
			return null;
		}
	}	

	public static function getUtenti($gruppo){
		$query=sprintf("SELECT Utenti.id, Utenti.nome,Utenti.password,Utenti.mail,Utenti.idAzienda,Utenti.idRuolo FROM Gruppi JOIN GestioneGruppi on Gruppi.id = GestioneGruppi.idGruppo JOIN Utenti  on GestioneGruppi.idUtente = Utenti.id WHERE id=%d", $gruppo->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$utenti = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$utenti[$row['id']]= new Utente($row['id'],$row['nome'],$row['password'],$row['mail'],$row['idAzienda'],$row['idRuolo']);
			}
			return $utenti;
		}else{
			return null;
		}
	}
}
