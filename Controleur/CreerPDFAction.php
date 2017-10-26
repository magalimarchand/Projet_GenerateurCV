<?php
include '/mpdf/mpdf.php';//Récupération de la page php qui permet de créer un pdf
class CreerPDFAction implements Action {
	public function execute(){
		
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["noMembre"]))
			return "default";
		
		//CHOIX DU MODELE DE CV À CRÉER
		if (ISSET($_SESSION["CV01"]))
		{
			$cv = 'pdfCV01';
		}
		else if (ISSET($_SESSION["CV02"]))
		{
			$cv = 'pdfCV02';
		}
		else if (ISSET($_SESSION["CV03"]))
		{
			$cv = 'pdfCV03';
		}

		
		//CRÉATION DU PDF
		ob_start();  // Ouverture d'un buffer pour enregistrer des données
		include ('Vues/'.$cv.'.php'); //Récupération des données du CV choisi
		$content = ob_get_clean();// Enregistrement des données dans une variable et libération du buffer
		$mpdf = new mPDF(); 
		$mpdf->useActiveForms = true;
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($content);
		$mpdf->Output('proCV.pdf','D'); // Création du PDF
		return "resumeProfil";
	}
}
?>