<?php

class Ruolo{
	private $id;
	private $superadmin;
	private $ammAziendale;


	function __construct($id, $superadmin, $ammAziendale){
		$this->id=$id;
		$this->superadmin=$superadmin;
		$this->ammAziendale=$ammAziendale;

	}


	public function getId(){
		return $this->id;
	}

	public function getSuperadmin(){
		return $this->superadmin;
	}

	public function setSuperadmin($superadmin){
		$this->superadmin = $superadmin;
	}

	public function getAmmAziendale(){
		return $this->ammAziendale;
	}

	public function setAmmAziendale($ammAziendale){
		$this->ammAziendale = $ammAziendale;
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

}
