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
				$gruppi[$row['id']]= new Gruppo($row['id'],$row['sigla'],$row['descrizione'],$row['idAzienda']);
			}
			return $gruppi;
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
		$query=sprintf("UPDATE Gruppi SET sigla='%s', descrizione='%s', idAzienda=%d WHERE id=%d",$gruppo->getSigla(),$gruppo->getDescrizione(),$gruppo->getIdAzienda(),$gruppo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function getAzienda($gruppo){
		$query=sprintf("SELECT * FROM Aziende WHERE id=%d",$gruppo->getIdAzienda());
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

	public static function getRisorse($gruppo){
		$query=sprintf("SELECT Risorse.id, Risorse.nome, Risorse.data, Risorse.idAzienda FROM Risorse JOIN Sequenze ON Risorse.id=Sequenze.idRisorsa
		JOIN Gruppi ON Gruppi.id=Sequenze.idGruppo WHERE Gruppi.id=%d",$gruppo->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$risorse= array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$risorse[$row['id']]= new Risorsa($row['id'],$row['nome'],$row['data'],$row['idAzienda']);
			}
			return $risorse;
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

	public static function getGruppoByAzienda($azienda){
		$query=sprintf("SELECT Gruppi.id,Gruppi.sigla,Gruppi.descrizione,Gruppi.idAzienda FROM Gruppi
										JOIN Aziende ON Gruppi.idAzienda = Aziende.id
										WHERE Aziende.id=%d",$azienda->getId());

		$result=DBCONNECTION::$con->query($query);
		if($result){
			$gruppi = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$gruppi[$row['id']]= new Gruppo($row['id'],$row['sigla'],$row['descrizione'],$row['idAzienda']);
			}
			return $gruppi;
		}else{
			return null;
		}
	}

	public static function getGruppoByUtente($utente){
		$query=sprintf("SELECT * FROM Gruppi
										JOIN GestioneGruppi ON Gruppi.id = GestioneGruppi.idGruppo
										JOIN Utenti ON GestioneGruppi.idUtente = Utenti.id
										WHERE Utenti.id=%d",$utente->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$gruppoArray = $result->fetch_array(MYSQLI_ASSOC);
			$gruppo = new Gruppo($gruppoArray['id'],$gruppoArray['sigla'],$gruppoArray['descrizione'],$gruppoArray['idAzienda']);
			return $gruppo;
		}else{
			return null;
		}
	}
}
