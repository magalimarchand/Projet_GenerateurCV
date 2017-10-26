<?php
require_once('./Controleur/Action.php');
require_once('/controleur/RequirePRGAction.php');
require_once('./Modele/Classes/Formation.php');
require_once('./Modele/FormationDAO.php');
class EnregistrerFormationAction implements Action, RequirePRGAction {
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();

		// vérifier que la session du membre est active (avec son no de membre)
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION["noMembre"]))
                    return "default";		
		
		//si oui
		 
		// si le submit a été effectué alors que le champs était nul
		if (ISSET($_REQUEST['ajouter'])) {
			
			// créer une instance de FormationDAO pour communiquer avec la base de données
			$daoFormation = new FormationDAO();	
			// créer une instance de la classe Formation
			$formation = new Formation();					

			// mofifier les attributs de l'instance de la classe Formation avec
			// ce qui est récupéré dans les champs du formulaire
			$formation->setTitreFormation(addslashes($_REQUEST['titre2']));
			$formation->setNoMembre($_SESSION['NoMembre']);
			$formation->setNomDiplome($_REQUEST['diplome2']);
			$formation->setEtablissement(addslashes($_REQUEST['etablissement2']));
			$formation->setDateFinF($_REQUEST['date2']);
			$formation->setDescFormation(addslashes($_REQUEST['descForm2']));			
			
			// créer un nouvel enregistrement dans la base de données, avec l'instance de la classe Formation
			$daoFormation->create($formation);
        }  	
		
		// si le submit a été effectué alors que le champs n'était pas nul
		if (ISSET($_REQUEST["edit"])){
			
			// créer une instance de FormationDAO pour communiquer avec la base de données
			$daoForm = new FormationDAO();
			
			// récupérer la valeur des champs du formulaire et l'identifiant de la formation
			$titre = $_REQUEST['titre1'];
			$diplome = $_REQUEST['diplome1'];
			$ecole = $_REQUEST['etablissement1'];
			$date = $_REQUEST['date1'];
			$desc = (addslashes($_REQUEST['descForm1']));
			$idF = $_REQUEST['idForm'];
			
			// trouver la formation dans la base de données avec son identifiant
			$form = $daoForm->find($idF);
			
			// modifier l'état des attributs de l'instance de la classe Formation avec la
			// valeur des champs récupérés
			$form->setTitreFormation($titre);
			$form->setNomDiplome($diplome);
			$form->setEtablissement($ecole);
			$form->setDateFinF($date);
			$form->setDescFormation($desc);
			
			// mettre à jour la formation dans la base de données
			// avec les valeurs des attributs de l'instance de la classe Formation
			$daoForm->update($form);
		}
		
		// si le submit est supprimer
		if (ISSET($_REQUEST["sup"])){
			
			// créer une instance de FormationDAO pour communiquer avec la base de données
			$daoF = new FormationDAO();
			
			// créer une instance de la classe Formation 
			$form = new Formation();
			
			// attribuer l'id de la formation à l'instance de la formation
			$form->setIdFormation($_REQUEST["idForm"]);
			
			// supprimer la formation de la bd
			$daoF->delete($form);

		}	
		// action afficherFormations qui retournera la vue formation
		return "afficherFormations";
	}
}
?>