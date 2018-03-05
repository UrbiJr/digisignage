<?php



class Dispositivo{
	private $id;
	private $indirizzo_mac;
	private $indirizzo_ip;								
	private $nome;
	private $orientamento;
	private $id_gruppo;	
	
	function __construct($id, $indirizzo_mac, $indirizzo_ip, $nome, $orientamento, $id_gruppo){
		$this->id=$id;
		$this->indirizzo_mac=$indirizzo_mac;
		$this->indirizzo_ip=$indirizzo_ip;
		$this->nome=$nome;	
		$this->orientamento=$orientamento;
		$this->id_gruppo=$id_gruppo;
	
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}
	
	public function getIndirizzoMac(){
		return $this->indirizzo_mac;
	}

	public function setIndirizzoMac($indirizzo_mac){
		$this->indirizzo_mac = $indirizzo_mac;
	}

	public function getIndirizzoIp(){
		return $this->indirizzo_ip;
	}

	public function setIndirizzoIp($indirizzo_ip){
		$this->Indirizzo_ip = $indirizzo_ip;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getOrientamento(){
		return $this->orientamento;
	}
	
	public function setOrientamento($orientamento){
		$this->orientamento = $orientamento;
	}
	
	public function getIdGruppo(){
		return $this->id_gruppo;
	}
	
	public function setIdGruppo($id_gruppo){
		$this->id_gruppo = $id_gruppo;
	}
	
	
	public function save(){
		if(!$this->id){
			$n=DispositiviTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			DispositiviTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		DispositiviTab::remove($this);
	}
	
}
