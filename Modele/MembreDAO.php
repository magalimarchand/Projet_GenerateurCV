<?php
include_once('/Modele/Classes/Database.php');
include_once('/Modele/Classes/Membre.php');
include_once('/Modele/Classes/listeMembres.php');

class MembreDAO{
	public function create($memb){

		$request = "INSERT INTO `membres` (`IDMEMBRE`, `ALIAS`, `MOTDEPASSE`, `NOMMEMBRE`, 
		`PRENOMMEMBRE`, `TELDOMICILE`, `TELCELLULAIRE`, `ADNOCIVIQUE`, `ADNOMRUE`, `ADNOAPP`,
		`VILLE`, `CODEPOSTAL`, `COURRIEL`, PAGEWEB)".
				   "VALUES (DEFAULT,'".$memb->getAlias().
				   "','".$memb->getMdp()."', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '".
				   $memb->getCourriel()."', NULL)";   
				   
		try{
			$db = Database::getInstance();
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $db->exec($request);
		}
		catch(PDOException $e){
			throw $e;
		} 		   
	}
	
	public static function findAll(){
		try{
			$liste = new listeMembres();
			
			$requete = 'SELECT * FROM membres';
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
			foreach($res as $row){
				$m = new Membre();
				$m->loadFromRecord($row);
				$liste->add($m);
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
		
		$pstmt = $db->prepare("SELECT * FROM membres WHERE ALIAS = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$m = new Membre();
		
		if($result){
			$m->setIdMembre($result->IDMEMBRE);
			$m->setAlias($result->ALIAS);
			$m->setMdp($result->MOTDEPASSE);
			$m->setAdministrateur($result->ADMINISTRATEUR);
			$m->setNomMembre($result->NOMMEMBRE);
			$m->setPrenomMembre($result->PRENOMMEMBRE);
			$m->setTelDomicile($result->TELDOMICILE);
			$m->setTelCellulaire($result->TELCELLULAIRE);
			$m->setAdNoCivique($result->ADNOCIVIQUE);
			$m->setAdNomRue($result->ADNOMRUE);
			$m->setAdNoApp($result->ADNOAPP);
			$m->setVille($result->VILLE);
			$m->setCp($result->CODEPOSTAL);
			$m->setCourriel($result->COURRIEL);
			$m->setPageWeb($result->PAGEWEB);
			$pstmt->closeCursor();
			return $m;
		}
		$pstmt->closeCursor();
		return null;
	}

	
	public function update($x){
		$request = "UPDATE membres SET ALIAS ='".$x->getAlias()."',MOTDEPASSE = '".$x->getMdp()."',ADMINISTRATEUR = '".$x->getAdministrateur().
				   "',NOMMEMBRE = '".$x->getNomMembre()."',PRENOMMEMBRE = '".$x->getPrenomMembre().
				   "',TELDOMICILE = '".$x->getTelDomicile()."',TELCELLULAIRE = '".$x->getTelCellulaire().
				   "',ADNOCIVIQUE = '".$x->getAdNoCivique()."',ADNOMRUE = '".$x->getAdNomRue().
				   "',ADNOAPP = '".$x->getAdNoApp()."',VILLE = '".$x->getVille().
				   "',CODEPOSTAL = '".$x->getCp()."',COURRIEL = '".$x->getCourriel().
				   "',PAGEWEB = '".$x->getPageWeb().
				   "'"."WHERE IDMEMBRE = '".$x->getIdMembre()."'";
				   
				   try{
					   $db = Database::getInstance();
					   return $db->exec($request);
				   }
				   catch(PDOException $e){
					   throw $e;
				   }
	}
	public function updateAdmin($x){
		$request = "UPDATE membres SET ADMINISTRATEUR ='".$x->getAdministrateur().
				   "'"."WHERE IDMEMBRE = '".$x->getIdMembre()."'";
				   
				   try{
					   $db = Database::getInstance();
					   return $db->exec($request);
				   }
				   catch(PDOException $e){
					   throw $e;
				   }
	}
	
	public function delete($x){
		$request = "DELETE FROM membres WHERE IDMEMBRE = '".$x->getIdMembre()."'";
		
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