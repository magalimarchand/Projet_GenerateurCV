<?php
require_once('./Controleur/Action.php');
class LoginAction implements Action{
	public function execute(){
		
		// vérifier que la session du membre est active (avec l'alias)
		// sinon retourner à la page d'inscription
		if (!ISSET($_REQUEST["username"]))
			return "default";
		
		// vérifier la validité des champs du formulaire
		// si non valide, retourner la page d'accueil
		if (!$this->valide()){
			return "default";
		}
		require_once('./Modele/MembreDAO.php');
		
		// créer une instance de MembreDAO pour communiquer avec la base de données
		$membDAO = new MembreDAO();
		
		// chercher le membre dans la base de données
		$memb = $membDAO->find($_REQUEST["username"]);
		
		// s'il n'existe pas, afficher un message 
		if ($memb == null){
			$_REQUEST["field_messages"]["username"] = "Utilisateur inexistant";
			return "default";
		}
		
		// si le mot de passe entré ne correspond pas à celui de la bd, retourner 
		// un message d'erreur 
		if ($memb->getMdp() != $_REQUEST["password"]){
			$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect";
			return "default";
		}
		
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();
		
		// mettre les champs récupérés dans les variables de session
		// pour les recherches ultérieures		
		$_SESSION['alias'] = $memb->getAlias();
		$_SESSION['NoMembre'] = $memb->getIdMembre();
		
		// afficher la vue du profil du membre
		return "resumeProfil";			
	}
	
	public function valide(){
		$result = true;
		// si le champs username est vide, afficher un message - non valide
		if ($_REQUEST['username'] == ""){
			$_REQUEST["field_messages"]["username"] = "Entrer votre nom d'utilisateur";
			$result = false;			
		}
		// si le champs password est vide, afficher un message - non valide
		if ($_REQUEST["password"] == ""){
			$_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
			$result = false;
		}
		return $result;
	}
}
?>