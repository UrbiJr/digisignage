<?php



class Azienda{
	private $id;
	private $ragione_sociale;								
	
	function __construct($id, $ragione_sociale){
		$this->id=$id;
		$this->nome=$ragione_sociale;
	}


	public function getId(){
		return $this->id;
	}
	
	public function getRagioneSociale(){
		return $this->ragione_sociale;
	}

	public function setRagioneSociale($ragione_sociale){
		$this->ragione_sociale = $ragione_sociale;
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
