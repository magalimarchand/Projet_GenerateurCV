
<html class="bodycolor">

<head>
 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./CSS/StyleCV01.css">

</head>
 
<body>

	<!-- AFFICHAGE DU CV -->
	<div id="cv">
			
		<!-- INFOS -->
		<?php
		require_once("./Modele/MembreDAO.php");	
		require_once("./Modele/Classes/Membre.php");	
				
		$alias = $_SESSION["alias"];		
		$daoM = new MembreDAO();
		$memb = $daoM->find($alias);
		$_SESSION["noMembre"] = $memb->getIdMembre();
		$id = $_SESSION["noMembre"]; 
		?>
		
		<div class="mainDetails">
		<div id="name">
			<h1>  <?php echo ($_SESSION['prenom']) ?> <span> </span> <?php echo ($_SESSION['nom']) ?> </h1>
		</div>
		
		<div id="contactDetails">
		<ul>
			<li><h4> <?php echo ($_SESSION['courriel']) ?> </h4></li>
			<li><h4> <?php echo ($_SESSION['teldomicile']) ?> </h4></li>
			<li><h4> <?php echo ($_SESSION['telcellulaire']) ?> </h4></li>
			<li><h4> <?php echo ($_SESSION['adresse']) ?> <?php echo ($_SESSION['appartement']) ?> </h4></li>
			<li><h4> <?php echo ($_SESSION['ville']) ?> <?php echo ($_SESSION['codepostal']) ?> </h4></li>
			<li><h4> <?php echo ($_SESSION['pageweb']) ?> </h4></li>
		</ul>
		</div>
		</div>
		<div class="clear"></div>
		<!-- FIN INFOS -->
		
		<div id="mainArea">
				
		<!-- EXPÉRIENCES -->
		<?php	
		require_once("./Modele/ExpProDAO.php");	
		require_once("./Modele/Classes/ExpPro.php");
		require_once("./Modele/Classes/listeExpPro.php");
		require_once("./Modele/TacheDAO.php");	
		require_once("./Modele/Classes/Tache.php");
		require_once("./Modele/Classes/listeTaches.php");	
		$daoEP = new ExpProDAO();
		$daoT = new TacheDAO();
		$listeEP = $daoEP->findAll($id);
		?>
		<?php if (($_SESSION['experience']) != "") { ?>
		<section>
			<div class="sectionTitle">
				<h1>EXPÉRIENCE DE TRAVAIL</h1>
			</div>
			<?php 
			$tabId = array_unique($_SESSION['experience']); 
			foreach ($_SESSION['experience'] as $experience) {
				while ($listeEP->next()){
					$ep = $listeEP->getCurrent();
					if($ep != NULL){
			?>
			<div class="clear"></div>			
			<div class="sectionTitle">
				<article>
					<h2 class="sectionLeft"><?php echo $ep->getPoste()?></h2>
					<div class="clear"></div>
					<h3 class="sectionLeft entreprise"><?php echo $ep->getEntreprise()?></h3>
					<p class="subDetails sectionDate">de <?php echo $ep->getDateDebutEP()?> à <?php echo $ep->getDateFinEP()?></p>
				</article>	
			</div>
			<div class="clear"></div>
			<?php			
			$idT = $ep->getIdExpPro();
			$listeT=$daoT->findAll($idT);
			while ($listeT->next()){
				$t = $listeT->getCurrent();
				if($t != NULL){ 
			?>		
			<div class="clear"></div>
			<div class="sectionContent">
				<article>	
					<p class="taches">&bull; <?php echo $t->getNomTache()?></p>
				</article>
			<div class="clear"></div>				
			</div>
			<?php }}}}} ?>	
			<div class="clear"></div>
		</section>
		<?php } ?>	
		<!-- FIN EXPÉRIENCES -->
		
		<!-- FORMATIONS -->
		<?php
		require_once("./Modele/FormationDAO.php");	
		require_once("./Modele/Classes/Formation.php");
		require_once("./Modele/Classes/listeFormations.php");
		$daoF = new FormationDAO();
		$listeF = $daoF->findAll($id);
		?>
		<?php if (($_SESSION['formation']) != "") { ?>
		<section>
			<div class="sectionTitle">
				<h1>FORMATION</h1>
			</div>
			<div class="sectionTitle">
			<?php
			$formation = $_SESSION['formation']; 
			foreach ($_SESSION['formation'] as $formation) {
				while ($listeF->next()){
					$f = $listeF->getCurrent();
					if(($f->getIdFormation()) == $formation){
			?>
			<article>
				<h2><?php echo $f->getTitreFormation() ?><span> - </span><?php echo $f->getNomDiplome()?></h2> 
				<p class="subDetails"><?php echo $f->getEtablissement()?><span> - </span><?php echo $f->getDateFinF()?></p>
				
				<p>- <?php echo $f->getDescFormation()?></p>
			</article>
			<?php break;}}} ?>
			</div>
			<div class="clear"></div>
		</section>
		<?php } ?>
		<!-- FIN FORMATIONS -->
		
		<!-- AUTRES SECTIONS -->
		<?php
		require_once("./Modele/AutresSectionsDAO.php");	
		require_once("./Modele/Classes/Section.php");
		require_once("./Modele/Classes/listeAutresSections.php");
		$daoS = new AutresSectionsDAO();
		$id = $_SESSION["NoMembre"];
		$listeS = $daoS->findAll($id);
		?>
		<?php
		if (($_SESSION['autresection']) != "") {
			$autresection = $_SESSION['autresection']; 
			foreach ($_SESSION['autresection'] as $autresection) {
				while ($listeS->next()){
					$s = $listeS->getCurrent();
					if(($s->getIdSection()) == $autresection){
		?>
		<section>
			<article>
				<div class="sectionTitle">
					<h1><?php echo $s->getNomSection()?></h1>
				</div>
				<div class="sectionTitle">
					<p><?php echo $s->getDescSection()?></p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		<?php break;}}}} ?>
		<!-- FIN AUTRES SECTIONS -->
		</div> 
	</div><!-- FIN CV -->
</div>
</body>
</html>
