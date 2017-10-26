<?php
require_once('./Controleur/Action.php');
class AfficherSectionAction implements Action {
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();
		
		// vérifier que la session du membre est active (avec son no de membre)
		// si oui afficher la vue autreSection
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION["noMembre"]))
			return "default";
		return "autreSection";
	}
}
?>