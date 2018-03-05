<?php



class RuoliTab{
	private $ruoli = array();
	
	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM ruoli WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new ruolo($row['id'],$row['superadmin'],$row['amm_azziendale']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM ruoli");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$ruoli = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$ruolo[$row['id']]= new ruolo($row['id'],$row['superadmin'],$row['amm_azziendale']);
			}
			return $ruolo;
		}else{
			return null;
		}
	}


	public static function remove($ruolo){
		$query=sprintf("DELETE FROM ruoli WHERE id = %d ", $ruolo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($ruolo){
		$query=sprintf("INSERT INTO ruoli (superadmin,amm_azziendale) VALUES(%b,%b)",$ruolo->getSuperadmin(),$ruolo->getAmm_azziendale()); 
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($ruolo){
		$query=sprintf("UPDATE ruoli SET superadmin=%b, amm_azziendale=%b WHERE id=%d",$ruolo->getSuperadmin(),$ruolo->getAmm_azziendale(),$ruolo->getId());
		$result=DBCONNECTION::$con->query($query);
	}



}	

