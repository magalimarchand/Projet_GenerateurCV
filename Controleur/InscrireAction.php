<?php
require_once('./Controleur/Action.php');
require_once('/controleur/RequirePRGAction.php');
require_once('./Modele/MembreDAO.php');
require_once('./Modele/Classes/Membre.php');
		
class InscrireAction implements Action, RequirePRGAction{
	
	public function execute(){

		// vérifier que la session du membre est active (avec l'alias)
		// sinon retourner à la page d'inscription
		if (!ISSET($_REQUEST["username2"]))
			return "inscription";
		
		// vérifier la validité des champs du formulaire
		// si non valide, retourner la vue inscription
		if (!$this->valide()){
			return "inscription";
		}
		
		// récupérer la valeur des champs du formulaire d'inscription
		$idMembre = NULL;
		$alias = $_REQUEST["username2"];
		$mdp = $_REQUEST["mdp2"];
		$nomMembre = NULL;
		$prenomMembre = NULL;
		$adNoCivique = NULL;
		$adNomRue = NULL;
		$adNoApp = NULL;
		$ville = NULL;
		$cp = NULL;
		$courriel = $_REQUEST["email"];	
	
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();
		
		// créer une instance de MembreDAO pour communiquer avec la base de données
		$membDAO = new MembreDAO();
		
		// créer une instance de la classe Membre qui prend l'alias comme paramètre de constructeur
		$memb = new Membre($alias);		
		
		// mettre la valeur des propriétés mot de passe et courriel la valeur des champs récupérés dans le formulaire
		$memb->setMdp($mdp);
		$memb->setCourriel($courriel);

		// metter l'alias comme variable de session pour les recherches ultérieures
		$_SESSION['alias'] = $alias;
		
		
		// Créer un nouvel enregistrement "Membre" dans la base de données
		$membDAO->create($memb);
		
		// récupérer le No du membre créé par la base de données
		$m = $membDAO->find($alias);
		// mettre ce no de membre dans une variable de session pour les recherches ultérieures
		$_SESSION['noMembre'] = $m->getIdMembre();	

		
		// afficher la vue profil
		return "afficherInfos";
	}
	
	// vérification de la validité des champs du formulaire
	public function valide(){
		$result = true;
		// si le champs username2 est vide, afficher le message - non valide
		if ($_REQUEST['username2'] == ""){
			$_REQUEST["field_messages"]["username2"] = "Entrer votre nom d'utilisateur";
			$result = false;
		}
		// effectuer une recherche dans la base de données pour s'assurer
		// que l'alias n'est pas déjà utilisé. Auquel cas afficher un message - non valide
		$alias = $_REQUEST["username2"];
		$membDAO = new MembreDAO();
		$memb = $membDAO->find($alias);
		if($memb != NULL){
			$_REQUEST["field_messages"]["username2"] = "Utilisateur déjà existant";
			$result = false;	
		}  
		
		if ($_REQUEST['mdp2'] == ""){
			$_REQUEST["field_messages"]["mdp2"] = "Mot de passe obligatoire";
			$result = false;
		}
		
		// si le 1er et le 2e mot de passe entrés ne sont pas les mêmes, 
		// afficher un message - non valide
		if ($_REQUEST['mdp2'] != $_REQUEST['mdp3']){
			$_REQUEST["field_messages"]["mdp2"] = "Les mots de passe entres doivent etre identiques";
			$result = false;
		}
		// si le champs email est vide, afficher un message - non valide
		if ($_REQUEST['email'] == ""){
			$_REQUEST["field_messages"]["email"] = "Entrer votre courriel";
			$result = false;
		}
		// si le champs email ne respecte pas le format courriel - non valide
		if (filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
			$result = true;
	}else {
			$_REQUEST["field_messages"]["email"] = "Format du courriel invalide";
			$result = false;
		}
		
		return $result;
	}
	
}
?>