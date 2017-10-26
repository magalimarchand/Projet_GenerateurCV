<?php
include_once('/Modele/Classes/Database.php');
include_once('/Modele/Classes/ExpPro.php');
include_once('/Modele/Classes/listeExpPro.php');

class ExpProDAO{
	public function create($ep){
		if(($ep->getDateFinEP() == null)){
		$request = "INSERT INTO `experiencepro` (`IDEXPPRO`, `POSTE`, `ENTREPRISE`, `DATEDEBUTEP`, `NOMEMBRE`)".
				   "VALUES (DEFAULT,'".$ep->getPoste()."','".
				   $ep->getEntreprise()."','".$ep->getDateDebutEP()."','".$ep->getNoMembre()."')";	
		}else{
		$request = "INSERT INTO `experiencepro` (`IDEXPPRO`, `POSTE`, `ENTREPRISE`, `DATEDEBUTEP`, `DATEFINEP`,`NOMEMBRE`)".
				   "VALUES (DEFAULT,'".$ep->getPoste()."','".
				   $ep->getEntreprise()."','".$ep->getDateDebutEP()."','".$ep->getDateFinEP()."','".$ep->getNoMembre()."')";
		}
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
			$liste = new listeExpPro();
			
			$requete = 'SELECT * FROM experiencepro WHERE NOMEMBRE ='.$id;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
			foreach($res as $row){
				$ep = new ExpPro();
				$ep->loadFromRecord($row);
				$liste->add($ep);
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
		
		$pstmt = $db->prepare("SELECT * FROM experiencepro WHERE IDEXPPRO = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$ep = new ExpPro();
		
		if($result){
			$ep->setIdExpPro($result->IDEXPPRO);
			$ep->setPoste($result->POSTE);
			$ep->setEntreprise($result->ENTREPRISE);
			$ep->setDateDebutEP($result->DATEDEBUTEP);
			$ep->setDateFinEP($result->DATEFINEP);
			$pstmt->closeCursor();
			return $ep;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public function update($x){
		$request = "UPDATE experiencepro SET POSTE ='".$x->getPoste()."',ENTREPRISE = '".$x->getEntreprise().
				   "',DATEDEBUTEP = '".$x->getDateDebutEP()."',DATEFINEP = '".$x->getDateFinEP().
				   "'"."WHERE IDEXPPRO = '".$x->getIdExpPro()."'";
		var_dump($request);
				   try{
					   $db = Database::getInstance();
					   return $db->exec($request);
				   }
				   catch(PDOException $e){
					   throw $e;
				   }
	}
	
	public function delete($x){
		$request = "DELETE FROM experiencepro WHERE IDEXPPRO = '".$x->getIdExpPro()."'";
		
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