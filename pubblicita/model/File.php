<?php

class File{
	private $id;
	private $nome;
	private $tipo;
	private $path;
	private $idRisorsa;

	function __construct($id, $nome, $tipo, $path, $idRisorsa){
		$this->id=$id;
		$this->nome=$nome;
		$this->tipo=$tipo;
		$this->path=$path;
		$this->idRisorsa=$idRisorsa;
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

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getPath(){
		return $this->path;
	}

	public function setPath($path){
		$this->path = $path;
	}

	public function setIdRisorsa($idRisorsa){
		$this->idRisorsa = $idRisorsa;
	}

	public function getIdRisorsa(){
		return $this->idRisorsa;
	}

	public function save(){
		if(!$this->id){
			$this->controllaTipoFile();
			return true;
		}else{
			// controllare tipo file anche qui (update) ???
			FileTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		FileTab::remove($this);
	}

	public function getRisorsa(){
		return FileTab::getRisorsa($this);
	}


	public function controllaTipoFile(){
		$info = explode(".", $this->nome);
		switch($info[1]){
			case 'pdf':
				// converti e salva
				CreateFiles::convert($this);
				break;
			case 'docx':
			case 'odt':
				// converti e salva
				fileConverter::WordToPdfConvert($this->nome);
				CreateFiles::convert($this);
				break;
			default:
				// salva
				$n = FileTab::insert($this);
				$this->setId($n);
				break;
		}
	}

}
