<?php

class Dispositivo{
	private $id;
	private $indirizzoMac;
	private $indirizzoIp;
	private $nome;
	private $orientamento;
	private $idGruppo;

	function __construct($id, $indirizzoMac, $indirizzoIp, $nome, $orientamento, $idGruppo){
		$this->id=$id;
		$this->indirizzoMac=$indirizzoMac;
		$this->indirizzoIp=$indirizzoIp;
		$this->nome=$nome;
		$this->orientamento=$orientamento;
		$this->idGruppo=$idGruppo;
	}

	public function getId(){
		return $this->id;
	}

	public function getIndirizzoMac(){
		return $this->indirizzoMac;
	}

	public function setIndirizzoMac($indirizzoMac){
		$this->indirizzoMac = $indirizzoMac;
	}

	public function getIndirizzoIp(){
		return $this->indirizzoIp;
	}

	public function setIndirizzoIp($indirizzoIp){
		$this->indirizzoIp = $indirizzoIp;
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
		return $this->idGruppo;
	}

	public function setIdGruppo($idGruppo){
		$this->idGruppo = $idGruppo;
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

	public function getGruppo(){
		return DispositiviTab::getGruppo($this);
	}

}
