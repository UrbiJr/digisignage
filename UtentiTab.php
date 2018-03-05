<?php



class UtentiTab{
	$utenti = array();
	
	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM Utenti WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Utente($row['id'],$row['nome'],$row['password'],$row['mail'],$row['id_aziende'],$row['id_ruoli']);
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
				$utenti[$row['id']]= new Utente($row['id'],$row['nome'],$row['password'],$row['mail'],$row['id_aziende'],$row['id_ruoli']);
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
		$query=sprintf("INSERT INTO Utenti (nome,password,mail,id_aziende,id_ruoli) VALUES('%s','%s','%s',%d,%d)",$utente->getNome(),$utente->getPassword(),$utente->getMail(),$utente->getIdAzienda(),$utente->getIdRuolo()); 
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($utente){
		$query=sprintf("UPDATE Utenti SET nome='%s', password='%s', mail='%s', id_aziende=%d, id_ruoli=%d WHERE id=%d",$utente->getNome(),$utente->getPassword(),$utente->getMail(),$utente->getIdAzienda(),$utente->getIdRuolo,$utente->getId());
		$result=DBCONNECTION::$con->query($query);
	}



}	
