<?php
require_once('./Controleur/Action.php');
require_once('/controleur/RequirePRGAction.php');
require_once('./Modele/Classes/Objectif.php');
require_once('./Modele/ObjectifDAO.php');
class EnregistrerObjectifAction implements Action, RequirePRGAction {
	
	//  Enregistrer un nouvel objectif ou en modifier un existant
	
	
	public function execute(){
		
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();

		// vérifier que la session du membre est active (avec son no de membre)
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION["NoMembre"]))
                    return "default";
				
				
		//si oui

         // si le submit enregistrer a été envoyé
        if (ISSET($_REQUEST['enregistrer'])) {

			// créer une instance de ObjectifDAO pour communiquer avec la base de données
			$daoObjectif = new ObjectifDAO();
			
			// vérifier dans la base de données si le membre (par son identifiant)
			// a déjà un objectif d'attribué
			$obj = $daoObjectif->find($_SESSION["NoMembre"]);
			
			// récupérer ce qui est contenu dans le champs objectif
			$desc = (addslashes($_REQUEST['objectif']));			
			
			// si un objectif est déjà attribué à ce membre
			if ($obj != NULL) {	
			
			// attribuer la valeur du champs objectif à l'instance de la classe Objectif
			$obj->setDescObjectif($desc);
			
			// mettre à jour l'objectif dans la base de données
			$daoObjectif->update($obj);
			
			// s'il n'y a pas d'objectif attribué à ce membre (noMembre) dans la base de données
			}else if ($obj == NULL){
				// créer une instance de la classe Objectif
				$obj = new Objectif();
				
				// y attribuer comme attribut description la valeur du champs récupéré dans le formulaire
				$obj->setDescObjectif($desc);
				
				// y attribuer comme attribut noMembre la valeur de la variable de session noMembre
				$obj->setNoMembre($_SESSION["NoMembre"]);
				
				// créer un nouvel enregistrement dans la base de données
				$daoObjectif->create($obj);
			}
        }   
		// si le submit est supprimer
		if (ISSET($_REQUEST["sup"])){
			
			// créer une instance de ObjectifDAO pour communiquer avec la base de données
			$daoO = new ObjectifDAO();
			
			// créer une instance de la classe Objectif 
			$obj = new Objectif();
			
			// attribuer l'id de l'objectif à l'instance de la Objectif
			$obj->setIdObjectif($_REQUEST["numO"]);
			
			// supprimer l'objectif de la bd
			$daoO->delete($obj);

		}	
		// action afficherObjectifs qui retournera la vue objectifs		
		return "afficherObjectifs";
	}
}
?>