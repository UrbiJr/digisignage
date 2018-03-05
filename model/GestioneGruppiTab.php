<?php



class GestioneGruppiTab{
	private $gestioni = array();
	
	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM Gestione_gruppi WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new GestioneGruppo($row['id'],$row['id_gruppi'],$row['id_utenti']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM Gestione_gruppi");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$gestioni = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$gestioni[$row['id']]= new GestioneGruppo($row['id'],$row['id_gruppi'],$row['id_utenti']);
			}
			return $gestioni;
		}else{
			return null;
		}
	}


	public static function remove($gestione){
		$query=sprintf("DELETE FROM Gestione_gruppi WHERE id = %d ", $gestione->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($gestione){
		$query=sprintf("INSERT INTO Gestione_gruppi (id_gruppi,id_utenti) VALUES(%d,%d)",$gestione->getIdGruppo(),$gestione->getIdUtente()); 
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($gestione){
		$query=sprintf("UPDATE Gestione_gruppi SET id_gruppi=%d, id_utenti=%d WHERE id=%d",$gestione->getIdGruppo(),$gestione->getIdUtente(),$gestione->getId());
		$result=DBCONNECTION::$con->query($query);
	}



}	

