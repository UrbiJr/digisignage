<?php



class GestioneGruppo{
	private $id;
	private $id_gruppo;		
	private $id_utente;
	
	function __construct($id, $id_gruppo, $id_utente){
		$this->id=$id;
		$this->id_gruppo=$id_gruppo;
		$this->id_utente=$id_utente;
	}


	public function getId(){
		return $this->id;
	}
	
	public function getIdGruppo(){
		return $this->id_gruppo;
	}
	
	public function setIdGruppo($id_gruppo){
		$this->id_gruppo = $id_gruppo;
	}
	
	public function getIdUtente($id_utente){
		return $this->id_utente;
	}
	public function setIdUtente($id_utente){
		$this->id_utente = $id_utente;
	}
	
	public function save(){
		if(!$this->id){
			$n=GestioneGruppiTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			GestioneGruppiTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		GestioneGruppiTab::remove($this);
	}
	
}
