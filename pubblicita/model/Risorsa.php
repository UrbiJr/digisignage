
<?php

include("CreateFiles.php");

class Risorsa{
	private $id;
	private $nome;
	private $idAzienda;

	/* 	costruttore per Risorse create per la prima volta
		OPPURE (ri)create dalle query (es. GruppiTab::getRisorse()).
		Per risorse create per la prima volta, passare null come
		primo parametro.
		Altrimenti, utilizzare l'$id restituito dalla query (per esempio)
	*/
	function __construct($id, $nome, $idAzienda){
		$this->id = $id;
		$this->nome=$nome;
		$this->idAzienda=$idAzienda;
		if ($this->id == null) {
			$this->controllaTipoRisorsa();
		}
	}

	public function setId($id){
		$this->id=$id;
	}

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getIdAzienda(){
		return $this->idAzienda;
	}

	public function setIdAzienda($idAzienda){
		$this->nome = $idAzienda;
	}


	public function save(){
		if(!$this->id){
			$n=RisorseTab::insert($this);
			$this->setId($n);
		}else{
			RisorseTab::update($this);
		}
		$this->saveToDatabase();
	}

	public function delete(){
		RisorseTab::remove($this);
	}

	public function getFile(){
		return RisorseTab::getFile($this);
	}

	function controllaTipoRisorsa(){
		$tmp_name=explode('/',TEMP_NAME);
		$info = explode(".", $this->nome);
		switch($info[1]){
			case 'pdf':
				echo (CreateFiles::convert(TEMP_NAME,"./images/",$info[0]));
				break;
			default:
				rename((TEMP_NAME), ("./images/".$this->nome));
		}
	}

	private function saveToDatabase(){
		$info = explode(".", $this->nome);
		if($info[1]==='pdf'){
			$n=CreateFiles::countPages(TEMP_NAME);
			if($n==1){
				$name="1.jpeg";
				$file=new File(null,$name,null, './images/' . $name,$this->id);
				$file->save();
			}else{
				for($i=0;$i<$n;$i++){
					$name=$i.".jpeg";
					$file=new File(null,$name,null, './images/' . $name,$this->id);
					$file->save();
				}
			}
		}else{
			$name="1.jpeg";
			$file=new File(null,$this->name,null, './images/' . $this->getNome(),$this->id);
			$file->save();
		}
	}
	
	private function MakeDir($name){
		
	}
}
