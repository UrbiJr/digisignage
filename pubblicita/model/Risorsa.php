<?php

include("CreateFiles.php");
class Risorsa{
	private $id;
	private $nome;
	private $idAzienda;

	private $CONVERT_COMMAND_WORD_TO_PDF = "soffice --headless --convert-to pdf";
	private $CONVERT_COMMAND_PDF_TO_WORD = "soffice --headless --convert-to odt";

	function __construct($id, $nome, $idAzienda){
		$this->id=$id;
		$this->nome=$nome;
		$this->idAzienda=$idAzienda;
		$this->controllaTipoRisorsa();
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
			$this->saveToDatabase();
			return true;
		}else{
			RisorseTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		RisorseTab::remove($this);
	}

	public function getFiles(){
		return RisorseTab::getFiles($this);
	}

	function controllaTipoRisorsa(){
		$info = explode(".", $this->nome);
		switch(@$info[1]){
			case 'pdf':
				echo (CreateFiles::convert($this->nome,"../images/",$info[0]));
				break;
			case 'docx':
			case 'odt':
				CreateFiles::WordTopPdfConvert($this->nome);
				echo (CreateFiles::convert($info[0].".pdf","../images/",$info[0]));
				break;
		}
	}

	public function saveToDatabase(){
		$info = explode(".", $this->getNome());
		$n=CreateFiles::countPages("../images/".$this->getNome());
		if($n==1){
			$name=$info[0].".jpeg";
			$file=new File(null,$name,null, './images/' . $name,$this->id);
			$file->save();
		}else{
			for($i=0;$i<$n;$i++){
				$name=$info[0]."-".$i.".jpeg";
				$file=new File(null,$name,null, './images/' . $name,$this->id);
				$file->save();
			}
		}
	}



}
