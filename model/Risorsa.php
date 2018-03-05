<?php



class Risorsa{
	private $id;
	private $nome;														
							
	
	function __construct($id, $nome){
		$this->id=$id;
		$this->nome=$nome;
	}


	public function getId(){
		return $this->id;
	}
	
	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function save(){
		if(!$this->id){
			$n=RisorseTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			RisorseTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		RisorseTab::remove($this);
	}
	
}
