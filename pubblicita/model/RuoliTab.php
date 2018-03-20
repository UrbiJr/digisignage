<?php

class RuoliTab{
	private $ruoli = array();

	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM Ruoli WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Ruolo($row['id'],$row['codice'],$row['descrizione']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM Ruoli");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$ruoli = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$ruolo[$row['id']]= new Ruolo($row['id'],$row['codice'],$row['descrizione']);
			}
			return $ruolo;
		}else{
			return null;
		}
	}


	public static function remove($ruolo){
		$query=sprintf("DELETE FROM Ruoli WHERE id = %d ", $ruolo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($ruolo){
		$query=sprintf("INSERT INTO Ruoli (codice,descrizione) VALUES(%b,%b)",$ruolo->getCodice(),$ruolo->getDescrizione());
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($ruolo){
		$query=sprintf("UPDATE Ruoli SET codice=%b, descrizione=%b WHERE id=%d",$ruolo->getCodice(),$ruolo->getDescrizione(),$ruolo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function getUtenti($ruolo){
		$query=sprintf("SELECT * FROM Utenti WHERE idRuolo = %d", $ruolo->getId());
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
