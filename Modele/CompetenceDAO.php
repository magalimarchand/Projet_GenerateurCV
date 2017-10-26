<?php
include_once('/Modele/Classes/Database.php');
include_once('/Modele/Classes/Competence.php');
include_once('/Modele/Classes/listeCompetences.php');

class CompetenceDAO{
	public function create($c){
		$request = "INSERT INTO `competences` (`IDCOMPETENCE`, `DESCCOMPETENCE`,`NOMEMBRE`)".
				   "VALUES (DEFAULT,'".$c->getDescCompetence()."','".$c->getNoMembre()."')";

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
			$liste = new listeCompetences();
			
			$requete = 'SELECT * FROM competences WHERE NOMEMBRE ='.$id;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
			foreach($res as $row){
				$co = new Competence();
				$co->loadFromRecord($row);
				$liste->add($co);
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
	
	public static function findCompetence($id){
		$db = Database::getInstance();
		
		$pstmt = $db->prepare("SELECT * FROM competences WHERE IDCOMPETENCE = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$co = new Competence();
		
		if($result){
			$co->setIdCompetence($result->IDCOMPETENCE);
			$co->setDescCompetence($result->DESCCOMPETENCE);
			$co->setNoMembre($result->NOMEMBRE);
			$pstmt->closeCursor();
			return $co;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	
	public function update($x){				   
		$request = "UPDATE competences SET DESCCOMPETENCE ='".$x->getDescCompetence().
				   "'"."WHERE IDCOMPETENCE = '".$x->getIdCompetence()."'";

				   try{
					   $db = Database::getInstance();
					   return $db->exec($request);
				   }
				   catch(PDOException $e){
					   throw $e;
				   }
	}
	
	public function delete($x){
		$request = "DELETE FROM competences WHERE IDCOMPETENCE = '".$x->getIdCompetence()."'";
		
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