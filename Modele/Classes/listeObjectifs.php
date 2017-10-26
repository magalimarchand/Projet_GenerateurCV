<?php
require_once('/Modele/Classes/Navigable.php');

class listeObjectifs implements Navigable{
	private $objectifs;
	private $current = -1;
	
	public function __construct(){
		$this->objectifs = array();
	}
	
	public function add($ob){
		array_push($this->objectifs,$ob);
	}
	
	public function previous(){
		if($this->current>0){
			$this->current--;
			return true;
		}
		return false;
	}
	
	public function next(){
		if ($this->current<count($this->objectifs)){
			$this->current++;
			return true;
		}
		return false;
	}
	
	public function printCurrent(){
		if(isset($this->objectifs[$this->current]))
			echo $this->objectifs[$this->current];
	}
	
	public function getCurrent(){
		if(isset($this->objectifs[$this->current]))
			return $this->objectifs[$this->current];
		return null;
	}
}
?>