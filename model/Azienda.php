<?php

class Azienda{
	private $id;
	private $ragioneSociale;

	function __construct($id, $ragioneSociale){
		$this->id=$id;
		$this->ragioneSociale=$ragioneSociale;
	}

	public function getId(){
		return $this->id;
	}

	public function getRagioneSociale(){
		return $this->ragioneSociale;
	}

	public function setRagioneSociale($ragioneSociale){
		$this->ragioneSociale = $ragioneSociale;
	}

	public function save(){
		if(!$this->id){
			$n=AziendeTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			AziendeTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		AziendeTab::remove($this);
	}

}
