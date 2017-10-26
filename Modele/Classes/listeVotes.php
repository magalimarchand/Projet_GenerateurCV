<?php
require_once('/Modele/Classes/Navigable.php');

class listeVotes implements Navigable{
	private $votes;
	private $current = -1;
	
	public function __construct(){
		$this->votes = array();
	}
	
	public function add($vote){
		array_push($this->votes,$vote);
	}
	
	public function previous(){
		if($this->current>0){
			$this->current--;
			return true;
		}
		return false;
	}
	
	public function next(){
		if ($this->current<count($this->votes)){
			$this->current++;
			return true;
		}
		return false;
	}
	
	public function printCurrent(){
		if(isset($this->votes[$this->current]))
			echo $this->votes[$this->current];
	}
	
	public function getCurrent(){
		if(isset($this->votes[$this->current]))
			return $this->votes[$this->current];
		return null;
	}
}
?>