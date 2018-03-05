<?php



class DispositiviTab{
	private $dispositivi = array();
	
	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM ruoli WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new dispositivo($row['indirizzo_mac'],$row['indirizzo_ip'],$row['nome'],$row['orientamento'],$row['id_gruppo']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM ruoli");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$dispositivi = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$dispositivo[$row['id']]= new gruppo($row['indirizzo_mac'],$row['indirizzo_ip'],$row['nome'],$row['orientamento'],$row['id_gruppo']);
			}
			return $gruppo;
		}else{
			return null;
		}
	}


	public static function remove($gruppo){
		$query=sprintf("DELETE FROM ruoli WHERE id = %d ", $dispositivo->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($gruppo){
		$query=sprintf("INSERT INTO gruppi (indirizzo_mac,indirizzo_ip,nome,orientamento,id_gruppo) VALUES('%s','%s','%s','%s',%d)",$dispositivo->getIndirizzoMac(),$dispositivo->getIndirizzoIp(),$dispositivo->getNome(),$dispositivo->getOrientamento,$dispositivo->getIdGruppo()); 
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($gruppo){
		$query=sprintf("UPDATE gruppi SET indirizzo_mac='%s', indirizzo_ip='%s', nome='%s', orientamento='%s', id_gruppo=%d WHERE id=%d",$dispositivo->getIndirizzoMac(),$dispositivo->getIndirizzoIp(),$dispositivo->getNome(),$dispositivo->getOrientamento,$dispositivo->getIdGruppo()); 
		$result=DBCONNECTION::$con->query($query);
	}



}	

