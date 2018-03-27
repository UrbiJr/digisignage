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
			return new Sequenza($row['id'],$row['nOrdine'],$row['idRisorsa'],$row['idGruppo']);
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
				$sequenze[$row['id']]= new Sequenza($row['id'],$row['nOrdine'],$row['idRisorsa'],$row['idGruppo']);
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
		$query=sprintf("INSERT INTO Sequenze (nOrdine,idRisorsa,idGruppo) VALUES(%d,%d,%d)",$sequenza->getNOrdine(),$sequenza->getIdRisorsa(),$sequenza->getIdGruppo());
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($sequenza){
		$query=sprintf("UPDATE Sequenze SET nOrdine=%d, idRisorsa=%d, idGruppo=%d WHERE id=%d",$sequenza->getNOrdine(),$sequenza->getIdRisorsa(),$sequenza->getIdGruppo(),$sequenza->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function getGruppo($sequenza){
		$query=sprintf("SELECT * FROM Gruppi WHERE id=%d",$sequenza->getId());
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

	public static function getRisorse($sequenza){
		$query=sprintf("SELECT * FROM Risorse WHERE id=%d", $sequenza->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$risorse = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$risorse[$row['id']]= new Risorsa($row['id'],$row['nome']);
			}
			return $risorse;
		}else{
			return null;
		}
	}

	/* 	restituisce TRUE se un record con coppia FK idRisorsa = $idRisorsa e FK idGruppo
		= $idGruppo e' gia' presente nella tabella Sequenza.
		FALSE altrimenti.
		N.B. da utilizzare nella fase di assegnazione della risorsa a un gruppo:
		serve a verificare se quella risorsa e' stata gia' assegnata a quel
		gruppo. Evita dunque DOPPIONI nella tabella Sequenze.
	*/
	public static function alreadyExists($idRisorsa, $idGruppo) {
		$query = sprintf("SELECT * FROM Sequenze WHERE idRisorsa=%d AND idGruppo=%d", $idRisorsa, $idGruppo);
		$result=DBCONNECTION::$con->query($query);
		if (mysqli_num_rows($result) != 0){
			//record gia' presente
			return true;
		} else {
			//record non presente
			return false;
		}
	}

}
