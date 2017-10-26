<?php
class Competence{
	private $idCompetence;
	private $descCompetence;
	private $noMembre;
	
	
	public function getIdCompetence(){
		return $this->idCompetence;
	}
	public function setIdCompetence($value){
		return $this->idCompetence = $value;
	}
	
	public function getDescCompetence(){
		return $this->descCompetence;
	}
	public function setDescCompetence($value){
		return $this->descCompetence = $value;
	}
	
	public function getNoMembre(){
		return $this->noMembre;
	}
	public function setNoMembre($value){
		return $this->noMembre = $value;
	}	
	
	public function __toString(){
		return $this->descCompetence;
	}
	public function affiche(){
		echo $this->__toString();
	}
	public function loadFromRecord($ligne){
		$this->idCompetence = $ligne["IDCOMPETENCE"];
		$this->descCompetence = $ligne["DESCCOMPETENCE"];
		$this->noMembre = $ligne["NOMEMBRE"];
	}
}
?>