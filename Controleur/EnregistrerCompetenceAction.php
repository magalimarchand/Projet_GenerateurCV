<?php
require_once('./Controleur/Action.php');
require_once('/controleur/RequirePRGAction.php');
require_once('./Modele/Classes/Competence.php');
require_once('./Modele/CompetenceDAO.php');
class EnregistrerCompetenceAction implements Action, RequirePRGAction {
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();

		// vérifier que la session du membre est active (avec son no de membre)
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION["NoMembre"]))
                    return "default";
         
		 //si oui
		 
		 // si le submit a été effectué alors que le champs était nul
        if (ISSET($_REQUEST['ajouter'])) {
			// créer une instance de CompetenceDAO pour communiquer avec la base de données
			$daoCompetence = new CompetenceDAO();
			
			// créer une instance de la classe Competence
			$comp = new Competence();
			
			// récupérer ce qui est contenu dans le champs competence2
			$desc = (addslashes($_REQUEST['competence2']));
			
			// attribuer cette valeur à la propriété description de l'instance Competence
			$comp->setDescCompetence($desc);
			
			// attribuer le no de membre pour référence de la competence (dans son attribut noMembre)
			$comp->setNoMembre($_SESSION["NoMembre"]);
			
			// créer un nouvel enregistrement dans la base de données, avec l'instance de la classe Competence
			$daoCompetence->create($comp);
			

        }   
		// si le submit a été effectué alors que le champs n'était pas nul
		if (ISSET($_REQUEST["edit"])){
			
			// créer une instance de CompetenceDAO pour communiquer avec la base de données
			$competenceDAO = new CompetenceDAO();
			
			// récupérer ce qui est contenu dans le champs competence1
			$descC = (addslashes($_REQUEST['competence1']));
			
			// récupérer l'identifiant de la competence
			$idC = $_REQUEST['idComp'];	

			// trouver la competence dans la base de données avec son identifiant
			$competence = $competenceDAO->findCompetence($idC);	

			// modifier l'attribut description de l'instance de la competence avec la valeur du champs récupéré
			$competence->setDescCompetence($descC);
			
			// mettre à jour la competence dans la base de données
			$competenceDAO->update($competence);

		}	
		
		// si le submit est supprimer
		if (ISSET($_REQUEST["sup"])){
			
			// créer une instance de CompetenceDAO pour communiquer avec la base de données
			$daoC = new CompetenceDAO();
			
			// créer une instance de la classe Competence 
			$c = new Competence();
			
			// attribuer l'id de la competence à l'instance de la competence
			$c->setIdCompetence($_REQUEST["idComp"]);
			
			// supprimer la competence de la bd
			$daoC->delete($c);

		}	
		// action afficherCompetences qui retournera la vue competence
		return "afficherCompetences";
	}
}
?>