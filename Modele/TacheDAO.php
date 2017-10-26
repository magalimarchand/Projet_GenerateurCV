<?php
include_once('/Modele/Classes/Database.php');
include_once('/Modele/Classes/Tache.php');
include_once('/Modele/Classes/listeTaches.php');

class TacheDAO{
	public function create($t){
		$request = "INSERT INTO tache (IDTACHE, NOMTACHE, NOEXPPRO)".
				   "VALUES (DEFAULT,'".$t->getNomTache()."','".$t->getNoExpPro()."')";
		
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
			$liste = new listeTaches();
			
			$requete = 'SELECT * FROM tache WHERE NOEXPPRO ='.$id;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
			foreach($res as $row){
				$t = new Tache();
				$t->loadFromRecord($row);
				$liste->add($t);
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
	
	public static function findTache($id){
		$db = Database::getInstance();
		var_dump($id);
		$pstmt = $db->prepare("SELECT * FROM tache WHERE IDTACHE = :x");
		$pstmt->execute(array(':x' => $id));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$t = new Tache();
		
		if($result){
			$t->setIdTache($result->IDTACHE);
			$t->setNomTache($result->NOMTACHE);
			$t->setNoExpPro($result->NOEXPPRO);
			$pstmt->closeCursor();
			return $t;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public function update($x){
		$request = "UPDATE tache SET NOMTACHE ='".$x->getNomTache().
				   "'"."WHERE IDTACHE = '".$x->getIdTache()."'";
				   echo $request;
				   try{
					   $db = Database::getInstance();
					   return $db->exec($request);
				   }
				   catch(PDOException $e){
					   throw $e;
				   }
	}
	
	public function delete($x){
		$request = "DELETE FROM tache WHERE IDTACHE = '".$x->getIdTache()."'";
		
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