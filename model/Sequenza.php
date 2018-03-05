<?php



class Sequenza{
	private $id;
	private $n_ordine;							
	private $idRisorsa;
	private $idGruppo;								
							
	
	function __construct($id, $n_ordine,$idRisorsa,$idGruppo ){
		$this->id=$id;
		$this->n_ordine=$n_ordine;
		$this->idRisorsa=$idRisorsa;	
		$this->idGruppo=$idGruppo;
	}


	public function getId(){
		return $this->id;
	}
	
	public function getNOrdine(){
		return $this->n_ordine;
	}

	public function setNOrdine($n_ordine){
		$this->n_ordine = $n_ordine;
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
	
	public function getIdIdRisorsa(){
		return $this->idRisorsa;
	}
	
	public function save(){
		if(!$this->id){
			$n=UtentiTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			UtentiTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		UtentiTab::remove($this);
	}
	
}
