<?php
class Objectif{
	private $idObjectif;
	private $descObjectif;
	private $noMembre;
	
	
	public function getIdObjectif(){
		return $this->idObjectif;
	}
	public function setIdObjectif($value){
		return $this->idObjectif = $value;
	}
	
	public function getDescObjectif(){
		return $this->descObjectif;
	}
	public function setDescObjectif($value){
		return $this->descObjectif = $value;
	}
	
	public function getNoMembre(){
		return $this->noMembre;
	}
	public function setNoMembre($value){
		return $this->noMembre = $value;
	}
	
	public function __toString(){
		return $this->descObjectif;
	}
	public function affiche(){
		echo $this->__toString();
	}
	public function loadFromRecord($ligne){
		$this->idObjectif = $ligne["IDOBJECTIF"];
		$this->descObjectif = $ligne["DESCOBJECTIF"];
		$this->noMembre = $ligne["NOMEMBRE"];
	}
}
?>