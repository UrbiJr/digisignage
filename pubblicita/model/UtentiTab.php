<?php

class UtentiTab{
	private $utenti = array();

	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getByUtente_Password($utente, $psw){
		$psw = md5($psw);
		$query=sprintf("SELECT * FROM Utenti WHERE nome='%s' and password='%s'", $utente, $psw);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Utente($row['id'],$row['nome'],$row['password'],$row['mail'],$row['idAzienda'],$row['idRuolo']);
		}else{
			return null;
		}
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM Utenti WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Utente($row['id'],$row['nome'],$row['password'],$row['mail'],$row['idAzienda'],$row['idRuolo']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM Utenti");
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


	public static function remove($utente){
		$query=sprintf("DELETE FROM Utenti WHERE id = %d ", $utente->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($utente){
		$query=sprintf("INSERT INTO Utenti (nome,password,mail,idAzienda,idRuolo) VALUES('%s','%s','%s',%d,%d)",$utente->getNome(),$utente->getPassword(),$utente->getMail(),$utente->getIdAzienda(),$utente->getIdRuolo());
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($utente){
		$query=sprintf("UPDATE Utenti SET nome='%s', password='%s', mail='%s', idAzienda=%d, idRuolo=%d WHERE id=%d",$utente->getNome(),$utente->getPassword(),$utente->getMail(),$utente->getIdAzienda(),$utente->getIdRuolo(),$utente->getId());
		$result=DBCONNECTION::$con->query($query);
	}

		public static function getAzienda($utente){
		$query=sprintf("SELECT * FROM Azienda WHERE id=%d",$utente->getId());
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

	public static function getRuolo($utente){
		$query=sprintf("SELECT * FROM Ruolo WHERE id=%d",$utente->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$ruolo= new Ruolo($row['id'],$row['codice'],$row['descrizione']);
			}
			return $ruolo;
		}else{
			return null;
		}
	}


}
