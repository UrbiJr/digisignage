<?php

class Utente{
	private $id;
	private $nome;
	private $password;
	private $mail;
	private $idAzienda;
	private $idRuolo;


	function __construct($id, $nome, $password, $mail, $idAzienda, $idRuolo){
		$this->id=$id;
		$this->nome=$nome;
		$this->password=$password;
		$this->mail=$mail;
		$this->idAzienda=$idAzienda;
		$this->idRuolo=$idRuolo;
	}

	public function setId($id){
		$this->id=$id;
	}
	public function getId(){
		return $this->id;
	}

	public function getUsername(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getMail(){
		return $this->mail;
	}

	public function setMail($mail){
		$this->mail = $mail;
	}

	public function setIdAzienda($idAzienda){
		$this->idAzienda = $idAzienda;
	}

	public function getIdAzienda(){
		return $this->idAzienda;
	}

	public function setIdRuolo($idRuolo){
		$this->idRuolo = $idRuolo;
	}

	public function getIdRuolo(){
		return $this->idRuolo;
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

	public function getAzienda(){
		return UtentiTab::getAzienda($this);
	}

	public function getRuolo(){
		return UtentiTab::getRuolo($this);
	}

}
