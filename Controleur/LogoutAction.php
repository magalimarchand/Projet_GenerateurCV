<?php
require_once('./Controleur/Action.php');
class LogoutAction implements Action{
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();
		
		// retirer les variables de session
		UNSET($_SESSION["noMembre"]);
		UNSET($_SESSION["alias"]);
		
		// détruire la session
		session_destroy();

		// retourner à la page d'accueil
		return "default";
	}
}
?>