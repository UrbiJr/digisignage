<?php

class Sequenza{
	private $id;
	private $nOrdine;
	private $idRisorsa;
	private $idGruppo;

	function __construct($id, $nOrdine,$idRisorsa,$idGruppo ){
		$this->id=$id;
		$this->nOrdine=$nOrdine;
		$this->idRisorsa=$idRisorsa;
		$this->idGruppo=$idGruppo;
	}


	public function getId(){
		return $this->id;
	}

	public function getNOrdine(){
		return $this->nOrdine;
	}

	public function setNOrdine($nOrdine){
		$this->nOrdine = $nOrdine;
	}

	public function getIdGruppo(){
		return $this->idGruppo;
	}

	public function setIdGruppo($idGruppo){
		$this->idGruppo = $idGruppo;
	}

	public function setIdRisorsa($idRisorsa){
		$this->idRisorsa = $idRisorsa;
	}

	public function getIdRisorsa(){
		return $this->idRisorsa;
	}

	public function save(){
		if(!$this->id){
			$n=SequenzeTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			SequenzeTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		SequenzeTab::remove($this);
	}
	
	public function getGruppo(){
		SequenzeTab::getGruppo($this);
	}
	
	public function getRisorse(){
		SequenzeTab::getRisorse($this);
	}

}
