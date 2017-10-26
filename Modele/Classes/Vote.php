<?php
class Vote{
	private $idVote;
	private $modele;
	private $statut;
	private $noMembre;
	
	
	public function getIdVote(){
		return $this->idVote;
	}
	public function setIdVote($value){
		return $this->idVote = $value;
	}
	
	public function getModele(){
		return $this->modele;
	}
	public function setModele($value){
		return $this->modele = $value;
	}
	
	public function getStatut(){
		return $this->statut;
	}
	public function setStatut($value){
		return $this->statut = $value;
	}
	
	public function getNoMembre(){
		return $this->noMembre;
	}
	public function setNoMembre($value){
		return $this->noMembre = $value;
	}
	
	public function loadFromRecord($ligne){
		$this->idVote = $ligne["IDVOTE"];
		$this->modele = $ligne["MODELE"];
		$this->statut = $ligne["STATUT"];
		$this->noMembre = $ligne["NOMEMBRE"];
	}
}
?>