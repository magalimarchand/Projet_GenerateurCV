<?php
include_once('/Modele/Classes/Database.php');
include_once('/Modele/Classes/Section.php');
include_once('/Modele/Classes/listeAutresSections.php');

class AutresSectionsDAO{
	public function create($s){
		$request = "INSERT INTO autresection (IDSECTION, NOMSECTION, DESCSECTION,NOMEMBRE)".
				   "VALUES (DEFAULT,'".$s->getNomSection()
				   ."','".$s->getDescSection()."','".$s->getNoMembre()."')";
			var_dump($request);	   
		try{
			$db = Database::getInstance();
			return $db->exec($request);
		}
		catch(PDOException $e){
			throw $e;
		} 		   
	}
	
	public static function findAll($id){
		try{
			$liste = new listeAutresSections();
			
			$requete = 'SELECT * FROM autresection WHERE NOMEMBRE ='.$id;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
			foreach($res as $row){
				$sec = new Section();
				$sec->loadFromRecord($row);
				$liste->add($sec);
			}
			$res->closeCursor();
			$cnx = null;
			return $liste;
		}
		catch(PDOException $e){
			print "Error ! : ".$e->getMessage()."<br />";
			return $liste;
		}
	}
	
	public static function find($id){
		$db = Database::getInstance();
		
		$pstmt = $db->prepare("SELECT * FROM autresection WHERE IDSECTION = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$sec = new Section();
		
		if($result){
			$sec->setIdSection($result->IDSECTION);
			$sec->setNomSection($result->NOMSECTION);
			$sec->setDescSection($result->DESCSECTION);
			$sec->setNoMembre($result->NOMEMBRE);
			$pstmt->closeCursor();
			return $sec;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public function update($x){
		$request = "UPDATE autresection SET NOMSECTION ='".$x->getNomSection()."',DESCSECTION = '".$x->getDescSection().
		"'". "WHERE IDSECTION = '".$x->getIdSection()."'";
				   try{
					   $db = Database::getInstance();
					   return $db->exec($request);
				   }
				   catch(PDOException $e){
					   throw $e;
				   }
	}
	
	public function delete($x){
		$request = "DELETE FROM autresection WHERE IDSECTION = '".$x->getIdSection()."'";
		
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