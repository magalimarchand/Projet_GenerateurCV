<?php
require_once('./Controleur/Action.php');
require_once('/controleur/RequirePRGAction.php');
require_once('./Modele/Classes/Vote.php');
require_once('./Modele/VoteDAO.php');

class EnregistrerVoteAction implements Action, RequirePRGAction {
	
	//  Enregistrer un nouveau vote
	
	public function execute(){
		
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();

		// vérifier que la session du membre est active (avec son no de membre)
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION["NoMembre"]))
                    return "default";
							
		//si oui

		// créer une instance de VoteDAO pour communiquer avec la base de données
		$daoVote = new VoteDAO();
			
		// vérifier dans la base de données si le membre (par son identifiant)
		// a déjà un vote enregistré pour le modèle sélectionné
		$id = $_SESSION["NoMembre"];
		$mod = $_REQUEST["modele"];
		$listeV = $daoVote->findAllVotes($mod); //Tous les votes de la BD avec ce modèle
	
		while ($listeV->next()){
			$vote = $listeV->getCurrent();
			if($vote != NULL){
				if($vote->getNoMembre() == $id){ //Si il y a déjà un vote avec ce membre 				
					return 'afficherTemplate'; //On sort de l'action, on n'enregistre rien
				}
			}
		}
				
		//Si le membre n'a pas encore voté pour ce modèle

		$v = new Vote(); // créer une instance de la classe Vote
		$v->setModele($mod); // attribuer le modele associé au vote
		$v->setNoMembre($id); //  attribuer comme attribut noMembre la valeur de la variable de session noMembre
					
		if (ISSET($_REQUEST['up'])){
			$v->setStatut(0); // attribuer le statut du vote choisi par le membre
		}
		else if (ISSET($_REQUEST['down'])){
			$v->setStatut(1); // attribuer le statut du vote choisi par le membre
		}
			
		$daoVote->create($v); // créer un nouvel enregistrement dans la base de données			 

		return 'afficherTemplate'; // On recharge la page

	}
}
?>