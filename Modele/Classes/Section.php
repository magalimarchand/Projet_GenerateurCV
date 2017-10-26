<?php
class Section{
	private $idSection;
	private $nomSection;
	private $descSection;
	private $noMembre;
	
	
	public function getIdSection(){
		return $this->idSection;
	}
	public function setIdSection($value){
		return $this->idSection = $value;
	}
	
	public function getNomSection(){
		return $this->nomSection;
	}
	public function setNomSection($value){
		return $this->nomSection = $value;
	}
	
	public function getDescSection(){
		return $this->descSection;
	}
	public function setDescSection($value){
		return $this->descSection = $value;
	}
	
	public function getNoMembre(){
		return $this->noMembre;
	}
	public function setNoMembre($value){
		return $this->noMembre = $value;
	}
	

	public function loadFromRecord($ligne){
		$this->idSection = $ligne["IDSECTION"];
		$this->nomSection = $ligne["NOMSECTION"];
		$this->descSection = $ligne["DESCSECTION"];
		$this->noMembre = $ligne["NOMEMBRE"];
	}
}
?>