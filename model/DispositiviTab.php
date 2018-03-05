<?php



class DispositiviTab{
	private $gruppi = array();
	
	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM ruoli WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new gruppo($row['id'],$row['sigla'],$row['descrizione'],$row['id_azienda']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM ruoli");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$gruppi = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$gruppo[$row['id']]= new gruppo($row['id'],$row['sigla'],$row['descrizione'],$row['id_azienda']);
			}
			return $gruppo;
		}else{
			return null;
		}
	}


	public static function remove($gruppo){
		$query=sprintf("DELETE FROM ruoli WHERE id = %d ", $gruppo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($gruppo){
		$query=sprintf("INSERT INTO gruppi (sigla,descrizione,id_azienda) VALUES('%s','%s',%d)",$gruppo->getSigla(),$gruppo->getDescrizione(),$gruppo->getId_azienda()); 
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($gruppo){
		$query=sprintf("UPDATE gruppi SET sigla='%s', descrizione='%s', id_azienda=%d WHERE id=%d",$gruppo->getSigla(),$gruppo->getDescrizione(),$gruppo->getId_azienda());
		$result=DBCONNECTION::$con->query($query);
	}



}	

