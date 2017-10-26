<?php
class Membre{
	private $idMembre;
	private $alias;
	private $mdp;
	private $administrateur;
	private $nomMembre;
	private $prenomMembre;
	private $telDomicile;
	private $telCellulaire;
	private $adNoCivique;
	private $adNomRue;
	private $adNoApp;
	private $ville;
	private $cp;
	private $courriel;
	private $pageWeb;
	
	
	public function __construct($alias= ''){
		$this->idMembre = null;
		$this->alias = $alias;
		$this->administrateur = false;
	}
	
	public function getIdMembre(){
		return $this->idMembre;
	}
	public function setIdMembre($value){
		return $this->idMembre = $value;
	}
	
	public function getAlias(){
		return $this->alias;
	}
	public function setAlias($value){
		return $this->alias = $value;
	}
	
	public function getAdministrateur(){
		return $this->administrateur;
	}
	public function setAdministrateur($value){
		return $this->administrateur = $value;
	}
	
	public function getMdp(){
		return $this->mdp;
	}
	public function setMdp($value){
		return $this->mdp = $value;
	}
	
	public function getNomMembre(){
		return $this->nomMembre;
	}
	public function setNomMembre($value){
		return $this->nomMembre = $value;
	}
	
	public function getPrenomMembre(){
		return $this->prenomMembre;
	}
	public function setPrenomMembre($value){
		return $this->prenomMembre = $value;
	}
	
	public function getTelDomicile(){
		return $this->telDomicile;
	}
	public function setTelDomicile($value){
		return $this->telDomicile = $value;
	}
	
	public function getTelCellulaire(){
		return $this->telCellulaire;
	}
	public function setTelCellulaire($value){
		return $this->telCellulaire = $value;
	}
	
	public function getAdNoCivique(){
		return $this->adNoCivique;
	}
	public function setAdNoCivique($value){
		return $this->adNoCivique = $value;
	}
	
	public function getAdNomRue(){
		return $this->adNomRue;
	}
	public function setAdNomRue($value){
		return $this->adNomRue = $value;
	}
	
	public function getAdNoApp(){
		return $this->adNoApp;
	}
	public function setAdNoApp($value){
		return $this->adNoApp = $value;
	}
	
	public function getVille(){
		return $this->ville;
	}
	public function setVille($value){
		return $this->ville = $value;
	}
	
	public function getCp(){
		return $this->cp;
	}
	public function setCp($value){
		return $this->cp = $value;
	}
	
	public function getCourriel(){
		return $this->courriel;
	}
	public function setCourriel($value){
		return $this->courriel = $value;
	}
	
	public function getPageWeb(){
		return $this->pageWeb;
	}
	public function setPageWeb($value){
		return $this->pageWeb = $value;
	}
	

	
	public function loadFromRecord($ligne){
		$this->idMembre = $ligne["IDMEMBRE"];
		$this->alias = $ligne["ALIAS"];
		$this->mdp = $ligne["MOTDEPASSE"];
		$this->administrateur = $ligne["ADMINISTRATEUR"];
		$this->nomMembre = $ligne["NOMMEMBRE"];
		$this->prenomMembre = $ligne["PRENOMMEMBRE"];
		$this->telDomicile = $ligne["TELDOMICILE"];
		$this->telCellulaire = $ligne["TELCELLULAIRE"];
		$this->adNoCivique = $ligne["ADNOCIVIQUE"];
		$this->adNomRue = $ligne["ADNOMRUE"];
		$this->adNoApp = $ligne["ADNOAPP"];
		$this->ville = $ligne["VILLE"];
		$this->cp = $ligne["CODEPOSTAL"];
		$this->courriel = $ligne["COURRIEL"];
		$this->pageWeb = $ligne["PAGEWEB"];
	}
}
?>