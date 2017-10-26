<?php
require_once('/Modele/Classes/Navigable.php');

class listeAutresSections implements Navigable{
	private $sections;
	private $current = -1;
	
	public function __construct(){
		$this->sections = array();
	}
	
	public function add($section){
		array_push($this->sections,$section);
	}
	
	public function previous(){
		if($this->current>0){
			$this->current--;
			return true;
		}
		return false;
	}
	
	public function next(){
		if ($this->current<count($this->sections)){
			$this->current++;
			return true;
		}
		return false;
	}
	
	public function printCurrent(){
		if(isset($this->sections[$this->current]))
			echo $this->sections[$this->current];
	}
	
	public function getCurrent(){
		if(isset($this->sections[$this->current]))
			return $this->sections[$this->current];
		return null;
	}
}
?>