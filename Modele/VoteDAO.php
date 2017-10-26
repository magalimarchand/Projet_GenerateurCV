<?php
include_once('/Modele/Classes/Database.php');
include_once('/Modele/Classes/Vote.php');
include_once('/Modele/Classes/listeVotes.php');

class VoteDAO{
	public function create($v){
		$request = "INSERT INTO `vote` (`IDVOTE`, `MODELE`, `STATUT`, `NOMEMBRE`)".
				   "VALUES (DEFAULT,'".$v->getModele().
				   "','".$v->getStatut()."','".$v->getNoMembre()."')";
  
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
			$liste = new listeVotes();
			
			$requete = 'SELECT * FROM vote WHERE NOMEMBRE ='.$id;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
			foreach($res as $row){
				$v = new Vote();
				$v->loadFromRecord($row);
				$liste->add($v);
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
	
	public static function findAllVotes($modele){
		try{
			$liste = new listeVotes();
			
			$requete = 'SELECT * FROM vote WHERE MODELE ='.$modele;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
			foreach($res as $row){
				$v = new Vote();
				$v->loadFromRecord($row);
				$liste->add($v);
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
		
		$pstmt = $db->prepare("SELECT * FROM vote WHERE IDVOTE = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$v = new Vote();
		
		
		if($result){
			$v->setIdVote($result->IDVOTE);
			$v->setModele($result->MODELE);
			$v->setStatut($result->STATUT);
			$v->setNoMembre($result->NOMEMBRE);
			$pstmt->closeCursor();

			return $v;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public function update($v){
		$request = "UPDATE vote SET MODELE ='".$v->getModele()."',STATUT = '".$v->getStatut()."'"
				   ."WHERE IDVOTE = '".$v->getIdVote()."'";
	   
				   try{
					   $db = Database::getInstance();
					   return $db->exec($request);
				   }
				   catch(PDOException $e){
					   throw $e;
				   }
	}
	
	public function delete($v){
		$request = "DELETE FROM vote WHERE IDVOTE = '".$v->getIdVote()."'";
		
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