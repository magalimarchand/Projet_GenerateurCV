<?php
class Formation{
	private $idFormation;
	private $titreFormation;
	private $nomDiplome;
	private $etablissement;
	private $dateFinF;
	private $descFormation;
	private $noMembre;
	
	
	public function getIdFormation(){
		return $this->idFormation;
	}
	public function setIdFormation($value){
		return $this->idFormation = $value;
	}
	
	public function getTitreFormation(){
		return $this->titreFormation;
	}
	public function setTitreFormation($value){
		return $this->titreFormation = $value;
	}
	
	public function getNomDiplome(){
		return $this->nomDiplome;
	}
	public function setNomDiplome($value){
		return $this->nomDiplome = $value;
	}
	
	public function getEtablissement(){
		return $this->etablissement;
	}
	public function setEtablissement($value){
		return $this->etablissement = $value;
	}

	public function getDateFinF(){
		return $this->dateFinF;
	}
	public function setDateFinF($value){
		return $this->dateFinF= $value;
	}
	
	public function getDescFormation(){
		return $this->descFormation;
	}
	public function setDescFormation($value){
		return $this->descFormation = $value;
	}
	
	public function getNoMembre(){
		return $this->noMembre;
	}
	public function setNoMembre($value){
		return $this->noMembre = $value;
	}
	

	public function loadFromRecord($ligne){
		$this->idFormation = $ligne["IDFORMATION"];
		$this->titreFormation = $ligne["TITREFORMATION"];
		$this->nomDiplome = $ligne["NOMDIPLOME"];
		$this->etablissement = $ligne["ETABLISSEMENT"];
		$this->dateFinF = $ligne["DATEFINF"];
		$this->descFormation = $ligne["DESCFORMATION"];
		$this->noMembre = $ligne["NOMEMBRE"];
	}
}
?>