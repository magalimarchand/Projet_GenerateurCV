<?php
require_once('./Controleur/Action.php');
require_once('/controleur/RequirePRGAction.php');
require_once('./Modele/Classes/ExpPro.php');
require_once('./Modele/ExpProDAO.php');
require_once('./Modele/Classes/Tache.php');
require_once('./Modele/TacheDAO.php');

class EnregistrerEPAction implements Action, RequirePRGAction {
	public function execute(){
		// vérifier que la session avec le serveur est ouverte, sinon l'ouvrir
		if (!ISSET($_SESSION)) session_start();

		// vérifier que la session du membre est active (avec son no de membre)
		// sinon retourner à la page d'accueil (default)
		if (!ISSET($_SESSION["NoMembre"]))
                    return "default";	

		
		//si oui
		 
		// si le submit a été effectué alors que le champs était nul
		if (ISSET($_REQUEST['ajouterEP'])) {
			// créer une instance de ExpProDAO pour communiquer avec la base de données
			$daoExpPro = new ExpProDAO();	
			
			// créer une instance de la classe ExpPro			
			$exPro = new ExpPro();			
			
			// récupérer ce qui est contenu dans les champs du formulaire
			// et les mettre dans les propriétés de l'instance de la classe exPro
			$exPro->setPoste(addslashes($_REQUEST['poste']));
			$exPro->setDateDebutEP($_REQUEST['dateDEP']);
			$exPro->setEntreprise(addslashes($_REQUEST['entreprise']));
			if(ISSET($_REQUEST['dateFEP'])){
			$exPro->setDateFinEP($_REQUEST['dateFEP']);} else $exPro->setDateFinEP(null);
			$exPro->setNoMembre($_SESSION["NoMembre"]);			
			
			// créer un nouvel enregistrement dans la base de données, avec l'instance de la classe exPro
			$daoExpPro->create($exPro);
        } 
		
		// si le submit a été effectué alors que le champs n'était pas nul
		if (ISSET($_REQUEST["editerEP"])){
			
		// créer une instance de ExpProDAO pour communiquer avec la base de données	
		$daoEP = new ExpProDAO();
		// créer une instance de la classe ExpPro
		$expPro = new ExpPro();
		
		// récupérer ce qui est contenu dans les champs du formulaire
		// et les mettre dans les propriétés de l'instance de la classe exPro
		$poste = (addslashes($_REQUEST['poste']));
		$dateD = $_REQUEST['dateDEP'];
		$etablissement = (addslashes($_REQUEST['entreprise']));
		$dateF = $_REQUEST['dateFEP'];
		$idEP = $_REQUEST['idEP'];
		
		// trouver l'expérience professionnelle dans la base de données 
		// dont l'identifiant correspond 
		$expPro = $daoEP->find($idEP);		

		// modifier les propriétés de l'instance de la classe exPro avec la valeur des champs récupérés
		$expPro->setPoste($poste);
		$expPro->setDateDebutEP($dateD);
		$expPro->setEntreprise($etablissement);
		$expPro->setDateFinEP($dateF);
		
		// mettre à jour l'experience professionnelle dans la base de données
		// avec l'instance de la classe exPro et ses nouvelles valeurs
		$daoEP->update($expPro);		
		} 
		
		// si le submit est supprimer
		if (ISSET($_REQUEST["sup"])){
			
			// créer une instance de ExpProDAO pour communiquer avec la base de données
			$daoEP = new ExpProDAO();
			
			// créer une instance de la classe ExpPro
			$ep = new ExpPro();
			
			// attribuer le no de l'expérience professionnalle à l'instance de l' ExpPro
			$ep->setIdExpPro($_REQUEST["idEP"]);
			
			// supprimer l'expérience professionnelle de la bd
			$daoEP->delete($ep);
		}	

		// si la tache != null - UPDATE
		if (ISSET($_REQUEST["editerT"])){
		
		$daoT = new TacheDAO();
		$t = new Tache();
		$t->setIdTache($_REQUEST["idTa"]);
		var_dump($_REQUEST["idTa"]);
		$t = $daoT->findTache($_REQUEST["idTa"]);		
		$ta = (addslashes($_REQUEST['tache']));

		$t->setNomTache($ta);
		
		$daoT->update($t);
		} 
		
		// si la tache == null - CREATE
		//else 
			if (ISSET($_REQUEST["ajouterT"])){
				echo "test01";
		$daoT = new TacheDAO();
		$t = new Tache();
		$t->setNomTache(addslashes($_REQUEST['tache2']));
		$t->setNoExpPro($_REQUEST['idEP']);
		
		$daoT->create($t);
		$_REQUEST['tache2'] = "";
		}
		
		// Le input est un submit qui envoi a "enregistrerEP"
		//else 
			if (ISSET($_REQUEST["supT"])){
			
		$daoT = new TacheDAO();
		$t = new Tache();
		$t->setIdTache($_REQUEST["idTa"]);
		$daoT->delete($t);
		}
		
		return "afficherExpPro";
	}

}
?>