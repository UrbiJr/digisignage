<?php

class UtentiTab{
	private $utenti = array();

	function __construct(){
	}

	/* 	manca parte REGISTRAZIONE (con annessa CRIPTAZIONE PASSWORD tramite password_hash())!!!!!!!!!!
		http://php.net/manual/en/function.password-hash.php
		HASHING E' CONSIGLIATO DAL MANUALE PHP PIUTTOSTO CHE md5 PERCHE' PIU' SICURO
		uso semplicissimo: basta questa riga
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		... dopodiche' aggiungi record utente al DB con questa $hashed_password
	*/

	public static function postLogin($username, $password){
		// RECUPERA PASSWORD CRIPTATA DAL DB
		$query=sprintf("SELECT hashed_password FROM Utenti WHERE username='%s'", $username);
		$result=DBCONNECTION::$con->query($query);
		if($result) {
			$row=$result->fetch_array(MYSQLI_ASSOC);
			// CONFRONTA PASSWORD PRESA DA INPUT CON HASHED PASSWORD (criptata), PRESA DAL DB
			$hashed_password = $row['hashed_password'];
			if(password_verify($password, $hashed_password)) {
				$query=sprintf("SELECT * FROM Utenti WHERE username='%s' and hashed_password='%s'", $username, $hashed_password);
				$result=DBCONNECTION::$con->query($query);
				if($result){
					$row=$result->fetch_array(MYSQLI_ASSOC);
					return new Utente($row['id'],$row['username'],$row['hashed_password'],$row['mail'],$row['idAzienda'],$row['idRuolo']);
				}
			}
		}
		return null;
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM Utenti WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Utente($row['id'],$row['username'],$row['hashed_password'],$row['mail'],$row['idAzienda'],$row['idRuolo']);
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
				$utenti[$row['id']]= new Utente($row['id'],$row['username'],$row['hashed_password'],$row['mail'],$row['idAzienda'],$row['idRuolo']);
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
		$query=sprintf("INSERT INTO Utenti (username,hashed_password,mail,idAzienda,idRuolo) VALUES('%s','%s','%s',%d,%d)",$utente->getUsername(),$utente->getPassword(),$utente->getMail(),$utente->getIdAzienda(),$utente->getIdRuolo());
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($utente){
		$query=sprintf("UPDATE Utenti SET username='%s', hashed_password='%s', mail='%s', idAzienda=%d, idRuolo=%d WHERE id=%d",$utente->getUsername(),$utente->getPassword(),$utente->getMail(),$utente->getIdAzienda(),$utente->getIdRuolo(),$utente->getId());
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
