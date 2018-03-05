<?php

class Gruppo{
	private $id;
	private $sigla;
	private $descrizione;
	private $idAzienda;

	function __construct($id, $sigla, $descrizione, $idAzienda){
		$this->id=$id;
		$this->sigla=$sigla;
		$this->descrizione=$descrizione;
		$this->idAzienda=$idAzienda;
	}

	public function getId(){
		return $this->id;
	}

	public function getSigla(){
		return $this->sigla;
	}

	public function setSigla($sigla){
		$this->sigla = $sigla;
	}

	public function getDescrizione(){
		return $this->descrizione;
	}

	public function setDescrizione($descrizione){
		$this->descrizione = $descrizione;
	}

	public function getIdAzienda($idAzienda){
		return $this->idAzienda;
	}

	public function setIdAzienda($idAzienda){
		$this->idAzienda = $idAzienda;
	}

	public function save(){
		if(!$this->id){
			$n=GruppiTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			GruppiTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		GruppiTab::remove($this);
	}

	public function getAzienda(){
		return GruppiTab::getAzienda($this);
	}

}
