<?php

class Ruolo{
	private $id;
	private $codice;
	private $descrizione;


	function __construct($id, $codice, $descrizione){
		$this->id=$id;
		$this->codice=$codice;
		$this->descrizione=$descrizione;

	}
	public function setId($id){
		$this->id=$id;
	}

	public function getId(){
		return $this->id;
	}

	public function getCodice(){
		return $this->codice;
	}

	public function setCodice($codice){
		$this->codice = $codice;
	}

	public function getDescrizione(){
		return $this->descrizione;
	}

	public function setDescrizione($descrizione){
		$this->descrizione = $descrizione;
	}

	public function save(){
		if(!$this->id){
			$n=RuoliTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			RuoliTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		RuoliTab::remove($this);
	}
	
	public function getUtenti(){
		return RuoliTab::getUtenti($this);
	}

}
