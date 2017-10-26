<?php
require_once('/Modele/Classes/Navigable.php');

class listeFormations implements Navigable{
	private $formations;
	private $current = -1;
	
	public function __construct(){
		$this->formations = array();
	}
	
	public function add($formation){
		array_push($this->formations,$formation);
	}
	
	public function previous(){
		if($this->current>0){
			$this->current--;
			return true;
		}
		return false;
	}
	
	public function next(){
		if ($this->current<count($this->formations)){
			$this->current++;
			return true;
		}
		return false;
	}
	
	public function printCurrent(){
		if(isset($this->formations[$this->current]))
			echo $this->formations[$this->current];
	}
	
	public function getCurrent(){
		if(isset($this->formations[$this->current]))
			return $this->formations[$this->current];
		return null;
	}
}
?>