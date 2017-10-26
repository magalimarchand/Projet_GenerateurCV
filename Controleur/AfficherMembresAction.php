<?php
require_once('./Controleur/Action.php');
class AfficherMembresAction implements Action {
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();	

// vérifier que la session du membre est active (avec son no de membre)
		// si oui afficher la vue profil (où sont les informations personnelles et coordonnées
		// sinon retourner à la page d'accueil (default)		
		if (!ISSET($_SESSION["alias"]))
			return "default";
		return "admMembres";
	}
}
?>