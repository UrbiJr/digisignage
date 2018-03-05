<?php



class Ruolo{
	private $id;
	private $superadmin;
	private $amm_aziendale;								
							
	
	function __construct($id, $superadmin, $amm_aziendale){
		$this->id=$id;
		$this->superadmin=$superadmin;
		$this->amm_aziendale=$amm_aziendale;	
	
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

	public function getAmm_aziendale(){
		return $this->amm_aziendale;
	}

	public function setAmmAziendale($amm_aziendale){
		$this->amm_aziendale = $amm_aziendale;
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
