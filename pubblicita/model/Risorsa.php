<?php

include("CreateFiles.php");
include("Thumbnail.php");

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
		//CREAZIONE CARTELLA PER OGNI RISORSA
		@mkdir("./images/azienda-".$this->idAzienda, 0777);
		chmod("./images/azienda-".$this->idAzienda, 0777);
		@mkdir("./images/azienda-".$this->idAzienda."/".$info[0], 0777);
		chmod("./images/azienda-".$this->idAzienda."/".$info[0], 0777);
		switch($info[1]){
			case 'pdf':
				if(CreateFiles::countPages(TEMP_NAME)>1){
					echo (CreateFiles::convert(TEMP_NAME,"./images/azienda-".$this->idAzienda."/".$info[0]."/","img"));
					Thumbnail::creaThumbnail("./images/azienda-".$this->idAzienda."/".$info[0]."/img-0.jpeg",$this->idAzienda, $info[0]);
				}else{
					echo (CreateFiles::convert(TEMP_NAME,"./images/azienda-".$this->idAzienda."/".$info[0]."/","img-0"));
					Thumbnail::creaThumbnail("./images/azienda-".$this->idAzienda."/".$info[0]."/img-0.jpeg",$this->idAzienda, $info[0]);
				}
				break;
			default:
				rename((TEMP_NAME), ("./images/azienda-".$this->idAzienda."/".$info[0]."/img-0.jpeg"));
				Thumbnail::creaThumbnail("./images/azienda-".$this->idAzienda."/".$info[0]."/img-0.jpeg",$this->idAzienda, $info[0]);
				break;
		}
	}

	private function saveToDatabase(){
		$info = explode(".", $this->nome);
		if($info[1]==='pdf'){
			$n=CreateFiles::countPages(TEMP_NAME);
			if($n==1){
				$name="img-1.jpeg";
				$file=new File(null,$name,null,"./images/azienda-".$this->idAzienda."/".$info[0]."/".$name,$this->id);
				$file->save();
			}else{
				for($i=0;$i<$n;$i++){
					$name="img-".++$i.".jpeg";
					$file=new File(null,$name,null,"./images/azienda-".$this->idAzienda."/".$info[0]."/".$name,$this->id);
					$file->save();
				}
			}
		}else{
			$name="img-1.jpeg";
			$file=new File(null,$name,null,"./images/azienda-".$this->idAzienda."/".$info[0]."/".$name,$this->id);
			$file->save();
		}
	}
}
