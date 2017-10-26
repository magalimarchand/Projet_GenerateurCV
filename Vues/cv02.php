
<html class="bodycolor">

<head>
 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./CSS/StyleCV02.css">

</head>
 
<body>
<div class="bodycolor">

	<!-- BOUTONS -->
	<form action="" method="post">
	<div class="container">
		<div class="col-xs-4 col-sm-offset-3">
			<a class="btn btn-info" type="button"  href="?action=afficherResume">Annuler</a>
		</div>
		<div class="col-xs-4">
			<button class="btn btn-primary" type="submit" >Créer PDF</button>
			<input type="hidden" name="action" value="creerPDF"> 			 
		</div>
	</div>
	</form>
	
	<!-- AFFICHAGE DU CV -->
	<div id="top">
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
			<h1>  <?php if(!empty($_POST['prenom'])) echo ($_POST['prenom']) ?> <span> </span> <?php if(!empty($_POST['nom'])) echo ($_POST['nom']) ?> </h1>
		</div>
		<div id="contactDetails">
		<ul>
			<li><h4> <?php if(!empty($_POST['courriel'])) echo ($_POST['courriel']) ?> </h4></li>
			<li><h4> <?php if(!empty($_POST['teldomicile'])) echo ($_POST['teldomicile']) ?> </h4></li>
			<li><h4> <?php if(!empty($_POST['telcellulaire'])) echo ($_POST['telcellulaire']) ?> </h4></li>
			<li><h4> <?php if(!empty($_POST['adresse'])) echo ($_POST['adresse']) ?> </h4></li>
			<li><h4> <?php if(!empty($_POST['appartement'])) echo ($_POST['appartement']) ?> </h4></li>
			<li><h4> <?php if(!empty($_POST['ville'])) echo ($_POST['ville']) ?> </h4></li>
			<li><h4> <?php if(!empty($_POST['codepostal'])) echo ($_POST['codepostal']) ?> </h4></li>
			<li><h4> <?php if(!empty($_POST['pageweb'])) echo ($_POST['pageweb']) ?> </h4></li>
		</ul>
		</div>
		<div class="clear"></div>
		</div>
		<!-- FIN INFOS -->
		
		<div id="mainArea">
		
		<!-- OBJECTIFS -->
		<?php
		require_once("./Modele/ObjectifDAO.php");	
		require_once("./Modele/Classes/Objectif.php");
		require_once("./Modele/Classes/listeObjectifs.php");
		$daoO = new ObjectifDAO();
		$id = $_SESSION["NoMembre"];
		$obj = $daoO->find($id);
		?>
		<?php 
		if(!empty($_POST['objectif'])) { ?>
		<section>
			<article>
				<div class="sectionTitle">
					<h1>Objectifs</h1>
				</div>
				<div class="sectionContent">
					<p><?php echo ($_POST['objectif']) ?></p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		<?php } ?>
		<!-- FIN OBJECTIFS -->
		
		<!-- COMPÉTENCES -->
		<?php
		require_once("./Modele/CompetenceDAO.php");	
		require_once("./Modele/Classes/Competence.php");
		require_once("./Modele/Classes/listeCompetences.php");
		$daoC = new CompetenceDAO();
		$listeC = $daoC->findAll($id);		
		?>
		<?php if(!empty($_POST['competence'])) { ?>
		<section>
			<div class="sectionTitle">
				<h1>Compétences</h1>
			</div>
			<div class="sectionContent">
				<ul class="keySkills">
				<?php
				$competence = $_POST['competence'];
				foreach ($_POST['competence'] as $competence) {
				?>
					<li><?php echo $competence ?> </br></br></li>
				<?php } ?>	
				</ul>
			</div>
			<div class="clear"></div>
		</section>
		<?php } ?>
		<!-- FIN COMPÉTENCES -->
		
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
		<?php if(!empty($_POST['experience'])) { ?>
		<section>
			<div class="sectionTitle">
				<h1>Expériences</h1>
			</div>
			<?php 
			/* J'ai remplacé $experience = $_POST['experience'] par cette ligne pour enlever les doublons: */
			$tabId = array_unique($_POST['experience']);
			foreach ($_POST['experience'] as $experience) {
				while ($listeEP->next()){
					$ep = $listeEP->getCurrent();
					if(($ep != NULL) ){ 
			?>			
			<div class="sectionContent">
				<article>
					<h2><?php echo $ep->getPoste()?></h2>
					<h3><?php echo $ep->getEntreprise()?></h3>
					<p class="subDetails">de <?php echo $ep->getDateDebutEP()?> à <?php echo $ep->getDateFinEP()?></p>
				</article>	
			</div>
			<?php			
			$idT = $ep->getIdExpPro();
			$listeT=$daoT->findAll($idT);
			while ($listeT->next()){
				$t = $listeT->getCurrent();
				if($t != NULL){ 
			?>		
			<div class="sectionContent">
				<article>	
					<p><?php echo $t->getNomTache()?></p>
				</article>
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
		<?php if(!empty($_POST['formation'])) { ?>
		<section>
			<div class="sectionTitle">
				<h1>Formations</h1>
			</div>
			<div class="sectionContent">
			<?php
			$formation = $_POST['formation']; 
			foreach ($_POST['formation'] as $formation) {
				while ($listeF->next()){
					$f = $listeF->getCurrent();
					if(($f->getIdFormation()) == $formation){
			?>
			<article>
				<h2><?php echo $f->getTitreFormation() ?></h2> 
				<h3><?php echo $f->getNomDiplome()?></h3>
				<h3><?php echo $f->getEtablissement()?></h3>
				<p class="subDetails"><?php echo $f->getDateFinF()?></p>
				<p><?php echo $f->getDescFormation()?></p>
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
		if(!empty($_POST['autresection'])) {
			$autresection = $_POST['autresection']; 
			foreach ($_POST['autresection'] as $autresection) {
				while ($listeS->next()){
					$s = $listeS->getCurrent();
					if(($s->getIdSection()) == $autresection){
		?>
		<section>
			<article>
				<div class="sectionTitle">
					<h1><?php echo $s->getNomSection()?></h1>
				</div>
				<div class="sectionContent">
					<p><?php echo $s->getDescSection()?></p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		<?php break;}}}} ?>
		<!-- FIN AUTRES SECTIONS -->
		</div> 
	</div>
	</div><!-- FIN CV -->
</div>
</body>
</html>
