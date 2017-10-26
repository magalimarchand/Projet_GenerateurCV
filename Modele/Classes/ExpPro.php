<?php
class ExpPro{
	private $idExpPro;
	private $poste;
	private $entreprise;
	private $dateDebutEP;
	private $dateFinEP;
	private $noMembre;
	
	
	public function getIdExpPro(){
		return $this->idExpPro;
	}
	public function setIdExpPro($value){
		return $this->idExpPro = $value;
	}
	
	public function getPoste(){
		return $this->poste;
	}
	public function setPoste($value){
		return $this->poste = $value;
	}
	
	public function getEntreprise(){
		return $this->entreprise;
	}
	public function setEntreprise($value){
		return $this->entreprise = $value;
	}
	
	public function getDateDebutEP(){
		return $this->dateDebutEP;
	}
	public function setDateDebutEP($value){
		return $this->dateDebutEP = $value;
	}
	
	public function getDateFinEP(){
		return $this->dateFinEP;
	}
	public function setDateFinEP($value){
		return $this->dateFinEP = $value;
	}
	
	public function getNoMembre(){
		return $this->NoMembre;
	}
	public function setNoMembre($value){
		return $this->NoMembre = $value;
	}
	
	public function __toString(){
		return $this->poste;
	}

	public function loadFromRecord($ligne){
		$this->idExpPro = $ligne["IDEXPPRO"];
		$this->poste = $ligne["POSTE"];
		$this->entreprise = $ligne["ENTREPRISE"];
		$this->dateDebutEP = $ligne["DATEDEBUTEP"];
		$this->dateFinEP = $ligne["DATEFINEP"];
		$this->noMembre = $ligne["NOMEMBRE"];
	}
}
?>