<?php
require_once('/Modele/Classes/Navigable.php');

class listeCompetences implements Navigable{
	private $competence;
	private $current = -1;
	
	public function __construct(){
		$this->competence = array();
	}
	
	public function add($competence){
		array_push($this->competence,$competence);
	}
	
	public function previous(){
		if($this->current>0){
			$this->current--;
			return true;
		}
		return false;
	}
	
	public function next(){
		if ($this->current<count($this->competence)){
			$this->current++;
			return true;
		}
		return false;
	}
	
	public function printCurrent(){
		if(isset($this->competence[$this->current]))
			echo $this->competence[$this->current];
	}
	
	public function getCurrent(){
		if(isset($this->competence[$this->current]))
			return $this->competence[$this->current];
		return null;
	}
}
?>