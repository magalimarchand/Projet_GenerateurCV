<?php
require_once('/Modele/Classes/Navigable.php');

class listeMembres implements Navigable{
	private $membres;
	private $current = -1;
	
	public function __construct(){
		$this->membres = array();
	}
	
	public function add($membre){
		array_push($this->membres,$membre);
	}
	
	public function previous(){
		if($this->current>0){
			$this->current--;
			return true;
		}
		return false;
	}
	
	public function next(){
		if ($this->current<count($this->membres)){
			$this->current++;
			return true;
		}
		return false;
	}
	
	public function printCurrent(){
		if(isset($this->membres[$this->current]))
			echo $this->membres[$this->current];
	}
	
	public function getCurrent(){
		if(isset($this->membres[$this->current]))
			return $this->membres[$this->current];
		return null;
	}
}
?>