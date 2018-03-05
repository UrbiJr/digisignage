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
			return new Risorsa($row['id'],$row['nome']);
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
				$risorse[$row['id']]= new Risorsa($row['id'],$row['nome']);
			}
			return $risorse;
		}else{
			return null;
		}
	}


	public static function remove($risorsa){
		$query=sprintf("DELETE FROM Risorse WHERE id = %d ", $risorsa->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($risorsa){
		$query=sprintf("INSERT INTO Risorse (nome) VALUES('%s')",$risorsa->getNome()); 
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($risorsa){
		$query=sprintf("UPDATE Risorse SET nome='%s' WHERE id=%d",$risorsa->getNome(),$risorsa->getId());
		$result=DBCONNECTION::$con->query($query);
	}



}	

