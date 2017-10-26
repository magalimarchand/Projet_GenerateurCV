<?php
require_once('./Controleur/Action.php');
class AfficherCVAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["noMembre"]))
			return "default";
		
		//ENREGISTREMENT DES DONNÉES DANS SESSION
		//Si le checkbox est coché...
		if(!empty($_POST['prenom'])) $_SESSION['prenom'] = $_POST['prenom'];
		else $_SESSION['prenom'] = "";
		if(!empty($_POST['nom'])) $_SESSION['nom'] = $_POST['nom'];
		else $_SESSION['nom'] = "";
		if(!empty($_POST['courriel'])) $_SESSION['courriel'] = $_POST['courriel'];
		else $_SESSION['courriel'] = "";
		if(!empty($_POST['teldomicile'])) $_SESSION['teldomicile'] = $_POST['teldomicile'];
		else $_SESSION['teldomicile'] = "";
		if(!empty($_POST['telcellulaire'])) $_SESSION['telcellulaire'] = $_POST['telcellulaire'];
		else $_SESSION['telcellulaire'] = "";
		if(!empty($_POST['adresse'])) $_SESSION['adresse'] = $_POST['adresse'];
		else $_SESSION['adresse'] = "";
		if(!empty($_POST['appartement'])) $_SESSION['appartement'] = $_POST['appartement'];
		else $_SESSION['appartement'] = "";
		if(!empty($_POST['ville'])) $_SESSION['ville'] = $_POST['ville'];
		else $_SESSION['ville'] = "";
		if(!empty($_POST['codepostal'])) $_SESSION['codepostal'] = $_POST['codepostal'];
		else $_SESSION['codepostal'] = "";
		if(!empty($_POST['pageweb'])) $_SESSION['pageweb'] = $_POST['pageweb'];
		else $_SESSION['pageweb'] = "";

		if(!empty($_POST['objectif'])) $_SESSION['objectif'] = $_POST['objectif'];
		else $_SESSION['objectif'] = "";
		if(!empty($_POST['competence'])) $_SESSION['competence'] = $_POST['competence'];
		else $_SESSION['competence'] = "";
		if(!empty($_POST['formation'])) $_SESSION['formation'] = $_POST['formation'];
		else $_SESSION['formation'] = "";
		if(!empty($_POST['autresection'])) $_SESSION['autresection'] = $_POST['autresection'];
		else $_SESSION['autresection'] = "";
		if(!empty($_POST['experience'])) $_SESSION['experience'] = $_POST['experience'];
		else $_SESSION['experience'] = "";
		
		//CHOIX DU MODÈLE DE CV POUR LE PDF
		if (ISSET($_POST["CV01"]))
		{
			$_SESSION['CV01'] = $_POST['CV01'];
			unset ($_SESSION['CV02']);
			unset ($_SESSION['CV03']);
			return "cv01";
		}
		else if (ISSET($_POST["CV02"]))
		{
			$_SESSION['CV02'] = $_POST['CV02'];
			unset ($_SESSION['CV01']);
			unset ($_SESSION['CV03']);
			return "cv02";
		}
		else if (ISSET($_POST["CV03"]))
		{
			$_SESSION['CV03'] = $_POST['CV03'];
			unset ($_SESSION['CV01']);
			unset ($_SESSION['CV02']);
			return "cv03";
		}
	}
}
?>