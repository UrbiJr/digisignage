<?php

class AziendeTab{
	private $aziende = array();

	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM Aziende WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Azienda($row['id'],$row['ragioneSociale']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM Aziende");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$aziende = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$aziende[$row['id']]= new Azienda($row['id'],$row['ragioneSociale']);
			}
			return $aziende;
		}else{
			return null;
		}
	}


	public static function remove($azienda){
		$query=sprintf("DELETE FROM Aziende WHERE id = %d ", $azienda->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($azienda){
		$query=sprintf("INSERT INTO Aziende (ragioneSociale) VALUES('%s')",$azienda->getRagioneSociale());
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($azienda){
		$query=sprintf("UPDATE Aziende SET ragioneSociale='%s' WHERE id=%d",$azienda->getRagioneSociale(),$azienda->getId());
		$result=DBCONNECTION::$con->query($query);
	}
	
	public static function getUtenti($azienda){
		$query=sprintf("SELECT * FROM Utenti WHERE id_azienda=%d",$azienda->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$utenti = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$dutenti[$row['id']]= new Utente($row['id'],$row['nome'],$row['password'],$row['mail'],$row['idAzienda'],$row['idRuolo']);
			}
			return $utenti;
		}else{
			return null;
		}
	}


}
