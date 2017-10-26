<?php
// ACTIONS - DIVERSES
require_once('./Controleur/DefaultAction.php');
require_once('./Controleur/allerInscripAction.php');
require_once('./Controleur/InscrireAction.php');
require_once('./Controleur/LoginAction.php');
require_once('./Controleur/LogoutAction.php');
require_once('./Controleur/CreerPDFAction.php');

//ACTIONS - ADMINISTRATION
require_once('./Controleur/AfficherMembresAction.php');
require_once('./Controleur/GestionMembAction.php');


//ACTIONS - Enregistrer (ajout & edition) LA BASE DE DONNEES
require_once('./Controleur/EditerInfoAction.php');
require_once('./Controleur/EnregistrerEPAction.php');
require_once('./Controleur/EnregistrerCompetenceAction.php');
require_once('./Controleur/EnregistrerFormationAction.php');
require_once('./Controleur/EnregistrerObjectifAction.php');
require_once('./Controleur/EnregistrerSectionAction.php');
require_once('./Controleur/EnregistrerVoteAction.php');


//ACTIONS - AFFICHER 
require_once('./Controleur/AfficherInfosAction.php');
require_once('./Controleur/AfficherExpProAction.php');
require_once('./Controleur/AfficherFormationsAction.php');
require_once('./Controleur/AfficherCompetencesAction.php');
require_once('./Controleur/AfficherObjectifsAction.php');
require_once('./Controleur/AfficherSectionAction.php');
require_once('./Controleur/AfficherResumeAction.php');
require_once('./Controleur/AfficherTemplateAction.php');
require_once('./Controleur/AfficherCVAction.php');




class ActionBuilder{
	public static function getAction($nom){

		switch ($nom){
		// ACTIONS - DIVERSES
			case "allerInscrip" :
				return new allerInscripAction();
				break;
			case "inscrire" :
				return new InscrireAction();
				break;
			case "connecter" :
				return new LoginAction();
				break;
			case "deconnecter" :
				return new LogoutAction();
				break;
			case "creerPDF" :
				return new CreerPDFAction();
				break;
				
		//ACTIONS - ADMINISTRATION		
			case "afficherMembres" :
				return new AfficherMembresAction();
				break;
			case "gestMemb" :
				return new GestionMembAction();
			break;			

				
		//ACTIONS - Enregistrer (ajout & edition) LA BASE DE DONNEES
			case "editerInfo" :
				return new EditerInfoAction();
				break;
			case "enregistrerEP" :
				return new EnregistrerEPAction();
				break;	
			case "enregistrerComp" :
				return new EnregistrerCompetenceAction();
				break;	
			case "enregistrerFormation" :
				return new EnregistrerFormationAction();
				break;	
			case "enrObjectif" :
				return new EnregistrerObjectifAction();
				break;	
			case "enrSection" :
				return new EnregistrerSectionAction();
				break;	
			case "enregistrerVote" :
				return new EnregistrerVoteAction();
				break;				
		
				
		//ACTIONS - AFFICHER 
			case "afficherInfos" :
				return new AfficherInfosAction();
				break;
			case "afficherExpPro" :
				return new AfficherExpProAction();
				break;
			case "afficherFormations" :
				return new AfficherFormationsAction();
				break;
			case "afficherCompetences" :
				return new AfficherCompetencesAction();		
				break;
			case "afficherObjectifs" :
				return new AfficherObjectifsAction();
				break;
			case "afficherSection" :
				return new AfficherSectionAction();
				break;
			case "afficherResume" :
				return new AfficherResumeAction();
				break;
			case "afficherTemplate" :
				return new AfficherTemplateAction();
				break;
			case "afficherCV" :
				return new AfficherCVAction();
				break;
				
			
			default :
				return new DefaultAction();
		}
	}
}
?>