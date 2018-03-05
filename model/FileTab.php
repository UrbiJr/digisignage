<?php



class FileTab{
	private $file = array();
	
	//Il costruttore riceve il nome del file sul quale appoggiare i dati
	function __construct(){
	}

	public static function getById($id){
		$query=sprintf("SELECT * FROM File WHERE id = %d", $id);
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$row=$result->fetch_array(MYSQLI_ASSOC);
			return new File($row['id'],$row['nome'],$row['tipo'],$row['path'],$row['id_risorse']);
		}else{
			return null;
		}
	}

	public static function getAll(){
		$query=sprintf("SELECT * FROM File");
		$result=DBCONNECTION::$con->query($query);
		if($result){
			$file = array();
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				$file[$row['id']]= new File($row['id'],$row['nome'],$row['tipo'],$row['path'],$row['id_risorse']);
			}
			return $file;
		}else{
			return null;
		}
	}


	public static function remove($file){
		$query=sprintf("DELETE FROM File WHERE id = %d ", $file->getId());
		$result=DBCONNECTION::$con->query($query);
	}

	public static function insert($file){
		$query=sprintf("INSERT INTO File (nome,tipo,path,id_risorse) VALUES('%s','%s','%s',%d)",$file->getNome(),$file->getTipo(),$file->getPath(),$file->getIdRisorse()); 
		$result=DBCONNECTION::$con->query($query);
		$n=DBCONNECTION::$con->insert_id;
		return $n;
	}

	public static function update($file){
		$query=sprintf("UPDATE File SET nome='%s', tipo='%s', path='%s', id_risorse=%d WHERE id=%d",$file->getNome(),$file->getTipo(),$file->getPath(),$file->getIdRisorse(),$file->getId());
		$result=DBCONNECTION::$con->query($query);
	}



}	

