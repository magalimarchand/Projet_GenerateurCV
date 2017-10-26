<?php
require_once('./Controleur/Action.php');
require_once('./Modele/Classes/Membre.php');
require_once('./Modele/MembreDAO.php');

class GestionMembAction implements Action {
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();

		// vérifier que la session du membre est active (avec son alias)
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION['alias']))
			return "default";
		
		// si oui 
		// créer une instance de MembreDAO pour communiquer avec la base de données
		$membDAO = new MembreDAO();
		
		// Trouver le membre dans la base de données, qui a pour alias celui récupéré dans la session
		$memb = $membDAO->find($_REQUEST['aliasM']);

		// si le submit est sur adm
		if (ISSET($_REQUEST["adm"])){
			$memb->setAdministrateur(1);			
			// Mettre à jour la base de données avec les informations contenus dans l'instance Membre
			$membDAO->updateAdmin($memb);
		}
		// si le submit est sur supMemb
		if (ISSET($_REQUEST["supMemb"])){
		$membDAO->delete($memb);
		}
		

		return "admMembres";
	}
}
?>