<?php

include("CreateFiles.php");

class Risorsa{
	private $id;
	private $nome;
	private $idAzienda;

	function __construct($id, $nome, $idAzienda){
		$this->id=$id;
		$this->nome=$nome;
		$this->idAzienda=$idAzienda;
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
	
}
