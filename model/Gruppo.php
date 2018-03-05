<?php



class Gruppo{
	private $id;
	private $sigla;
	private $descrizione;	
	private $id_azienda;						
							
	
	function __construct($id, $sigla, $descrizione, $id_azienda){
		$this->id=$id;
		$this->sigla=$sigla;
		$this->descrizione=$descrizione;	
		$this->id_azienda=$id_azienda;		
	
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
	
	public function getIdAzienda($id_azienda){
		return $this->id_azienda;
	}
	
	public function setIdAzienda($id_azienda){
		$this->id_azienda = $id_azienda;
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
	
}
