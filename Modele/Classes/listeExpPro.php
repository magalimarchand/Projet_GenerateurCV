<?php
require_once('/Modele/Classes/Navigable.php');

class listeExpPro implements Navigable{
	private $expPro;
	private $current = -1;
	
	public function __construct(){
		$this->expPro = array();
	}
	
	public function add($ep){
		array_push($this->expPro,$ep);
	}
	
	public function previous(){
		if($this->current>0){
			$this->current--;
			return true;
		}
		return false;
	}
	
	public function next(){
		if ($this->current<count($this->expPro)){
			$this->current++;
			return true;
		}
		return false;
	}
	
	public function printCurrent(){
		if(isset($this->expPro[$this->current]))
			echo $this->expPro[$this->current];
	}
	
	public function getCurrent(){
		if(isset($this->expPro[$this->current]))
			return $this->expPro[$this->current];
		return null;
	}
}
?>