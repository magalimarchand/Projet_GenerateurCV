<?php
class Tache{
	private $idTache;
	private $nomTache;
	private $NoExpPro;
	
	public function getIdTache(){
		return $this->idTache;
	}
	public function setIdTache($value){
		return $this->idTache = $value;
	}
	
	public function getNomTache(){
		return $this->nomTache;
	}
	public function setNomTache($value){
		return $this->nomTache = $value;
	}
	
	public function getNoExpPro(){
		return $this->NoExpPro;
	}
	public function setNoExpPro($value){
		return $this->NoExpPro = $value;
	}
	

	public function loadFromRecord($ligne){
		$this->idTache = $ligne["IDTACHE"];
		$this->nomTache = $ligne["NOMTACHE"];
		$this->noMembre = $ligne["NOEXPPRO"];
	}
}
?>