<?php
require_once('/Modele/Classes/Navigable.php');

class listeTaches implements Navigable{
	private $taches;
	private $current = -1;
	
	public function __construct(){
		$this->taches = array();
	}
	
	public function add($tache){
		array_push($this->taches,$tache);
	}
	
	public function previous(){
		if($this->current>0){
			$this->current--;
			return true;
		}
		return false;
	}
	
	public function next(){
		if ($this->current<count($this->taches)){
			$this->current++;
			return true;
		}
		return false;
	}
	
	public function printCurrent(){
		if(isset($this->taches[$this->current]))
			echo $this->taches[$this->current];
	}
	
	public function getCurrent(){
		if(isset($this->taches[$this->current]))
			return $this->taches[$this->current];
		return null;
	}
}
?>