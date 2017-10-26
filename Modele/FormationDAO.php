<?php
include_once('/Modele/Classes/Database.php');
include_once('/Modele/Classes/Formation.php');
include_once('/Modele/Classes/listeFormations.php');

class FormationDAO{
	public function create($form){
		$request = "INSERT INTO `formations` (`IDFORMATION`, `TITREFORMATION`, `NOMDIPLOME`, `ETABLISSEMENT`,  
					`DATEFINF`, `DESCFORMATION`, `NOMEMBRE`)".
				   "VALUES (DEFAULT,'".$form->getTitreFormation()."','".$form->getNomDiplome().
				   "','".$form->getEtablissement()."','".$form->getDateFinF()."','".
				   $form->getDescFormation()."','".$form->getNoMembre()."')";
  
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
			$liste = new listeFormations();
			
			$requete = 'SELECT * FROM formations WHERE NOMEMBRE ='.$id;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
			foreach($res as $row){
				$f = new Formation();
				$f->loadFromRecord($row);
				$liste->add($f);
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
	
	public static function find($idF){
		$db = Database::getInstance();
		
		$pstmt = $db->prepare("SELECT * FROM formations WHERE IDFORMATION = :x");
		$pstmt->execute(array(':x' => $idF));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$f = new Formation();
		
		
		if($result){
			$f->setIdFormation($result->IDFORMATION);
			$f->setTitreFormation($result->TITREFORMATION);
			$f->setNomDiplome($result->NOMDIPLOME);
			$f->setEtablissement($result->ETABLISSEMENT);
			$f->setDateFinF($result->DATEFINF);
			$f->setDescFormation($result->DESCFORMATION);
			$f->setNoMembre($result->NOMEMBRE);
			$pstmt->closeCursor();

			return $f;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public function update($x){
		$request = "UPDATE formations SET TITREFORMATION ='".$x->getTitreFormation()."',NOMDIPLOME = '".$x->getNomDiplome().
				   "',ETABLISSEMENT = '".$x->getEtablissement()."',DATEFINF = '".$x->getDateFinF().
				   "',DESCFORMATION = '".$x->getDescFormation()."'"."WHERE IDFORMATION = '".$x->getIdFormation()."'";
	   
				   try{
					   $db = Database::getInstance();
					   return $db->exec($request);
				   }
				   catch(PDOException $e){
					   throw $e;
				   }
	}
	
	public function delete($x){
		$request = "DELETE FROM formations WHERE IDFORMATION = '".$x->getIdFormation()."'";
		
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