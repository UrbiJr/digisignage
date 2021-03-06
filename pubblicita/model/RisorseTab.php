<?php
class RisorseTab{
	private $risorse = array();
	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}
	public static function getById($id){
		$query=sprintf("SELECT * FROM Risorse WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new Risorsa($row['id'],$row['nome'],$row['data'],$row['idAzienda']);
		}else{
			return null;
		}
	}
	public static function getAll(){
		$query=sprintf("SELECT * FROM Risorse");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$risorse = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$risorse[$row['id']]= new Risorsa($row['id'],$row['nome'],$row['data'],$row['idAzienda']);
			}
			return $risorse;
		}else{
			return null;
		}
	}
	public static function remove($risorsa){
		$query=sprintf("DELETE FROM File WHERE idRisorsa = %d", $risorsa->getId());
		$result=DBCONNECTION::$con->query($query);
		$query=sprintf("DELETE FROM Risorse WHERE id = %d", $risorsa->getId());
		$result=DBCONNECTION::$con->query($query);
	}
	public static function insert($risorsa){
		$query=sprintf("INSERT INTO Risorse (nome,data, idAzienda) VALUES('%s','%s', %d)",$risorsa->getNome(),$risorsa->getData(), $risorsa->getIdAzienda());
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}
	public static function update($risorsa){
		$query=sprintf("UPDATE Risorse SET nome='%s', data='%s', idAzienda=%d WHERE id=%d",$risorsa->getNome(),$risorsa->getData(), $risorsa->getIdAzienda() ,$risorsa->getId());
		$result=DBCONNECTION::$con->query($query);
	}
	public static function getFile($risorsa){
		$query=sprintf("SELECT * FROM File WHERE idRisorsa = %d", $risorsa->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$files = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$files[$row['id']]= new File($row['id'],$row['nome'],$row['tipo'],$row['path'],$row['idRisorsa']);
			}
			return $files;
		}else{
			return null;
		}
	}
	public static function getGruppo($risorsa){
		$query=sprintf("SELECT Gruppi.id, Gruppi.sigla, Gruppi.descrizione, Gruppi.idAzienda FROM Risorse JOIN Sequenze ON Risorse.id=Sequenze.idRisorse
		JOIN Gruppi ON Gruppi.id=Sequenze.idGruppo  WHERE Risorse.id=%d",$risorsa->getId());
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
	public static function getAzienda($risorsa){
		$query=sprintf("SELECT * FROM Aziende WHERE id=%d",$risorsa->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$azienda= new Azienda($row['id'],$row['nOrdine'],$row['idRisorsa'],$row['idGruppo']);
			}
			return $azienda;
		}else{
			return null;
		}
	}

	public static function getRisorseByUtente($utente){
		$query=sprintf("SELECT * FROM Risorse WHERE idAzienda=%d",$utente->getIdAzienda());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$risorse = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$risorse[$row['id']]= new Risorsa($row['id'],$row['nome'],$row['data'],$row['idAzienda']);
			}
			return $risorse;
		}else{
			return null;
		}
	}

	public static function getRisorseOutSeq($gruppo){
		$query = sprintf("SELECT * FROM Risorse
											WHERE id NOT IN(SELECT Sequenze.idRisorsa FROM Sequenze
																			WHERE idGruppo=%d)",$gruppo->getId());
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$risorse = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$risorse[$row['id']]= new Risorsa($row['id'],$row['nome'],$row['data'],$row['idAzienda']);
			}
			return $risorse;
		}else{
			return null;
		}

	}
}
