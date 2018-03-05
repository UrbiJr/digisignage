<?php



class SequenzeTab{
	private $sequenze = array();
	
	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM Sequenze WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Sequenza($row['id'],$row['n_ordine'],$row['id_risorse'],$row['id_gruppi']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM Sequenze");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$sequenze = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$sequenze[$row['id']]= new Sequenza($row['id'],$row['n_ordine'],$row['id_risorse'],$row['id_gruppi']);
			}
			return $sequenze;
		}else{
			return null;
		}
	}


	public static function remove($sequenza){
		$query=sprintf("DELETE FROM Sequenze WHERE id = %d ", $sequenza->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($sequenza){
		$query=sprintf("INSERT INTO Sequenze (n_ordine,id_risorse,id_gruppi) VALUES(%d,%d,%d)",$sequenza->getNOrdine(),$sequenza->getIdRisorsa(),$sequenza->getIdGruppo()); 
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($sequenza){
		$query=sprintf("UPDATE Sequenze SET n_ordine=%d, id_risorse=%d, id_gruppi=%d WHERE id=%d",$sequenza->getNOrdine(),$sequenza->getIdRisorsa(),$sequenza->getIdGruppo(),$sequenza->getId());
		$result=DBCONNECTION::$con->query($query);
	}



}	
