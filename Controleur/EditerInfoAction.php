<?php
require_once('./Controleur/Action.php');
require_once('./Modele/Classes/Membre.php');
require_once('./Modele/MembreDAO.php');

class EditerInfoAction implements Action {
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();

		// vérifier que la session du membre est active (avec son alias)
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION['alias']))
			return "default";
		
		if (!$this->valide()){
			return "profil";
		}
		// si oui 
		// créer une instance de MembreDAO pour communiquer avec la base de données
		$membDAO = new MembreDAO();

		// Trouver le membre dans la base de données, qui a pour alias celui récupéré dans la session
		$memb = $membDAO->find($_SESSION['alias']);		

			// Donner les valeurs aux attributs de l'instance Membre les champs récupérés dans le formulaire
			$memb->setPrenomMembre($_REQUEST['prenom']);
			$memb->setNomMembre($_REQUEST['nom']);
			$memb->setTelDomicile($_REQUEST['telD']);
			$memb->setTelCellulaire($_REQUEST['telC']);
			$memb->setAdNoCivique($_REQUEST['adNo']);
			$memb->setAdNomRue($_REQUEST['nomRue']);
			$memb->setAdNoApp($_REQUEST['appart']);
			$memb->setVille($_REQUEST['ville']);
			$memb->setCp($_REQUEST['cp']);
			$memb->setCourriel($_REQUEST['courriel']);
			$memb->setPageWeb($_REQUEST['pageweb']);
			
			// Mettre à jour la base de données avec les informations contenus dans l'instance Membre
			$membDAO->update($memb);

		return "profil";
	}
	
	// vérification de la validité des champs du formulaire
	public function valide(){
		$result = true;
		// Les validations pour les champs téléphone et code postal sont faits uniquement 
		// en considérant des usagers canadiens.
		// En modifiant la BD et les dao nous aurions pu intégrer un champs "pays"
		// et faire un regex conditionnel au champs "pays" récupéré.
		
		// si le champs téléphone domicile ne respecte pas le format canadien - non valide
		if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_REQUEST['telD'])) {  
			if($_REQUEST['telD'] != ""){
			$_REQUEST["field_messages"]["telD"] = "Le format du no de téléphone n'est pas valide";
			$result = false;
			}
		}
		// si le champs téléphone cell ne respecte pas le format canadien - non valide
		if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_REQUEST['telC'])) {  
			if($_REQUEST['telC'] != ""){
			$_REQUEST["field_messages"]["telC"] = "Le format du no de téléphone n'est pas valide";
			$result = false;
			}
		}
		// si le champs email ne respecte pas le format courriel - non valide
		if (filter_var($_REQUEST['courriel'], FILTER_VALIDATE_EMAIL)){
			$result = true;
		}else {
			$_REQUEST["field_messages"]["courriel"] = "Format du courriel invalide";
			$result = false;
		}
		
		// si le champs code postal ne respecte pas le format canadien - non valide
		if(!preg_match("/^[a-zA-Z]{1}[0-9]{1}[a-zA-Z]{1}(\-| |){1}[0-9]{1}[a-zA-Z]{1}[0-9]{1}$/", $_REQUEST['cp'])) {  
			if($_REQUEST['cp'] != ""){
			$_REQUEST["field_messages"]["cp"] = "Le format du code postal n'est pas valide";
			$result = false;
			}
		}
		
		return $result;
	}
}
?>