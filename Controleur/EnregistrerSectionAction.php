<?php
require_once('./Controleur/Action.php');
require_once('/controleur/RequirePRGAction.php');
require_once('./Modele/Classes/Section.php');
require_once('./Modele/AutresSectionsDAO.php');
class EnregistrerSectionAction implements Action, RequirePRGAction {
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();

		// vérifier que la session du membre est active (avec son no de membre)
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION["NoMembre"]))
                    return "default";
        //si oui

         // si le submit envoyé est "ajouter"
        if (ISSET($_REQUEST['ajouter'])) {	

			// créer une instance de AutresSectionsDAO pour communiquer avec la base de données
			$daoSection = new AutresSectionsDAO();
			
			// créer une instance de la classe Section
			$sec = new Section();
			
			// attribuer la valeur du champs à l'instance de la classe Section
			$sec->setNomSection(addslashes($_REQUEST['nomSection2']));
			$sec->setDescSection(addslashes($_REQUEST['description2']));
			$sec->setNoMembre($_SESSION["NoMembre"]);
			
			// créer un nouvel enregistrement dans la base de données
			$daoSection->create($sec);
			}   
		
		// si le submit envoyé est "edit"
		if (ISSET($_REQUEST["edit"])){
			
			// créer une instance de AutresSectionsDAO pour communiquer avec la base de données
			$daoSection = new AutresSectionsDAO();
			
			// récupérer la valeur des champs du formulaire et le id de la section
			$nomSec = $_REQUEST['nomSection1'];
			$descSec = $_REQUEST['description1'];
			$idSec = $_REQUEST['idSec'];
			
			// trouver la section dans la base données avec son id
			$sec = $daoSection->find($idSec);
			
			// attribuer à l'instance de la section les valeurs des champs récupérés
			$sec->setNomSection($nomSec);
			$sec->setDescSection($descSec);
			
			// mettre à jour la section dans la base de données
			$daoSection->update($sec);
		}	
		
		// si le submit est supprimer
		if (ISSET($_REQUEST["sup"])){
			
			// créer une instance de AutresSectionsDAO pour communiquer avec la base de données
			$daoSec = new AutresSectionsDAO();
			
			// créer une instance de la classe Section
			$sec = new Section();
			
			// attribuer l'id de la section à l'instance de la Section
			$sec->setIdSection($_REQUEST["idSec"]);
			
			// supprimer la section de la bd
			$daoSec->delete($sec);

		}	
		// action afficherSection qui retournera la vue autreSection	
		return "afficherSection";
	}
}
?>