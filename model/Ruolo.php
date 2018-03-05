<?php



class Ruolo{
	private $id;
	private $superadmin;
	private $amm_azziendale;								
							
	
	function __construct($id, $superadmin, $amm_azziendale){
		$this->id=$id;
		$this->superadmin=$superadmin;
		$this->amm_azziendale=$amm_azziendale;	
	
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

	public function getAmm_azziendale(){
		return $this->amm_azziendale;
	}

	public function setAmm_azziendale($amm_azziendale){
		$this->amm_azziendale = $amm_azziendale;
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
