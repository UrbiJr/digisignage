<?php

class GestioneGruppo{
	private $id;
	private $idGruppo;
	private $idUtente;

	function __construct($id, $idGruppo, $idUtente){
		$this->id=$id;
		$this->idGruppo=$idGruppo;
		$this->idUtente=$idUtente;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}	
	public function getIdGruppo(){
		return $this->idGruppo;
	}

	public function setIdGruppo($idGruppo){
		$this->idGruppo = $idGruppo;
	}

	public function getIdUtente($idUtente){
		return $this->idUtente;
	}
	public function setIdUtente($idUtente){
		$this->idUtente = $idUtente;
	}

	public function save(){
		if(!$this->id){
			$n=GestioneGruppiTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			GestioneGruppiTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		GestioneGruppiTab::remove($this);
	}

}
