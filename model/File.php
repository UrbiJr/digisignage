<?php



class File{
	private $id;
	private $nome;							
	private $tipo; 							
	private $path;
	private $idRisorse;							
							
	
	function __construct($id, $nome, $tipo, $path, $idRisorse){
		$this->id=$id;
		$this->nome=$nome;
		$this->tipo=$tipo;	
		$this->path=$path;
		$this->idRisorse=$idRisorse;
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

	public function setIdRisorse($idRisorse){
		$this->idRisorse = $idRisorse;
	}
	
	public function getIdRisorse(){
		return $this->IdRisorse;
	}
	
	public function save(){
		if(!$this->id){
			$n=FileTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			FileTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		FileTab::remove($this);
	}
	
}
