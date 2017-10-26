<?php
require_once('./Controleur/Action.php');
class allerInscripAction implements Action{
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();
		
		// afficher la vue inscription où l'utilisateur pourra remplir le
		// formulaire d'inscription
		return "inscription";			
	}
}
?>