<?php
require_once('./Controleur/Action.php');
require_once('./Modele/Classes/Vote.php');
require_once('./Modele/VoteDAO.php');

class AfficherTemplateAction implements Action {
	public function execute(){
		
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();
		
		// vérifier que la session du membre est active (avec son no de membre)
		// si oui afficher la vue template
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION["noMembre"]))
			return "default";
		
		
		// créer une instance de VoteDAO pour communiquer avec la base de données
		$daoVote = new VoteDAO();
			
		// vérifier dans la base de données si le membre (par son identifiant)
		// a déjà un vote enregistré pour le modèle sélectionné
		$id = $_SESSION["NoMembre"];	
		return "template";
	}
}
?>