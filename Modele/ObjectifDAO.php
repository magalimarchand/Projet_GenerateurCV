<?php
include_once('/Modele/Classes/Database.php');
include_once('/Modele/Classes/Objectif.php');
include_once('/Modele/Classes/listeObjectifs.php');

class ObjectifDAO{
	public function create($ob){

		$request = "INSERT INTO `objectifs` (`IDOBJECTIF`, `DESCOBJECTIF`,`NOMEMBRE`)".
				   "VALUES (DEFAULT,'".$ob->getDescObjectif()."','".$ob->getNoMembre()."')";

		try{
			$db = Database::getInstance();
			return $db->exec($request);
		}
		catch(PDOException $e){
			throw $e;
		} 		   
	}
	
	
	public static function find($id){
		$db = Database::getInstance();
		
		$pstmt = $db->prepare("SELECT * FROM objectifs WHERE NOMEMBRE = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);

		$ob = new Objectif();
		
		if($result){
			$ob->setIdObjectif($result->IDOBJECTIF);
			$ob->setDescObjectif($result->DESCOBJECTIF);
			$ob->setNoMembre($result->NOMEMBRE);
			$pstmt->closeCursor();
			return $ob;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	
	public function update($x){
		$request = "UPDATE objectifs SET DESCOBJECTIF ='".$x->getDescObjectif().
				   "'"."WHERE IDOBJECTIF = '".$x->getIdObjectif()."'";
				   
				   try{
					   $db = Database::getInstance();
					   return $db->exec($request);
				   }
				   catch(PDOException $e){
					   throw $e;
				   }
	}
	
	public function delete($x){
		$request = "DELETE FROM objectifs WHERE IDOBJECTIF = '".$x->getIdObjectif()."'";
		
		try{
			$db = Database::getInstance();
			return $db->exec($request);
		}
		catch(PDOException $e){
			throw $e;
		}
	}
	
}
?>