 <!DOCTYPE html>
 <html>
 <head>
	<title>Pro CV - Profil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./CSS/MonStyle01.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
	<div>
	<?php
		include("/Vues/banniere.php");		
	?>
		<div class="container">
		<?php
			require_once('./Modele/MembreDAO.php');	
			require_once('./Modele/Classes/Membre.php');	
			
			$alias = $_SESSION['alias'];
			$daoM = new MembreDAO();
			$memb = $daoM->find($alias);
			$_SESSION['noMembre'] = $memb->getIdMembre();
			$id = $_SESSION['noMembre'];
		?>
			<form action="" method="post">
				<div class="row">
					<div class="col-xs-offset-3 col-xs-8">
						<h3 id="txProfil">Profil de <?php echo $memb->getAlias() ?></h3>
						<h5>Cochez les cases que vous souhaitez inclure dans votre cv</h5>
					</div>				
					<div class="col-xs-1">
						<a href="?action=deconnecter">Deconnexion</a>
					</div>				
				</div>
			</form>
			<hr />
			<div class="row"></div>  
			<form id="formulaire" action="" method="post">
			<!-- AFFICHAGE DU MENU DE NAVIGATION -->
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<p class="navbar-text">Éditer les sections : </p> 
					<ul class="nav navbar-nav">
						<li><a href="?action=afficherInfos">Infos Personnelles</a></li>
						<li><a href="?action=afficherExpPro">Experiences Pro</a></li>
						<li><a href="?action=afficherFormations">Formations</a></li>
						<li><a href="?action=afficherCompetences">Competences</a></li>
						<li><a href="?action=afficherObjectifs">Objectifs</a></li>
						<li><a href="?action=afficherSection">Autres sections</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">	
					<!-- ADM -->
					<?php if($memb->getAdministrateur() == 1){ ?>
						
						<a href="?action=afficherMembres" class="btn btn-danger" role="button">Administration</a> 
					<?php } ?>
					<!-- FIN ADM -->					
						<button class="btn btn-danger navbar-btn dropdown-toggle" type="button" 
							data-toggle="dropdown">Produire votre cv<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><button type="submit" name="CV01">Selon modèle 1</button></li>
							<li><button type="submit" name="CV02">Selon modèle 2</button></li>
							<li><button type="submit" name="CV03">Selon modèle 3</button></li>
							<input type="hidden" name="action" value="afficherCV">
							<li><a href="?action=afficherTemplate">Voir tous les modèles</a></li>
						</ul>
					</ul>
				</div>
			</nav>
			<!-- FIN AFFICHAGE DU MENU DE NAVIGATION -->
			
			<!-- AFFICHAGE DES INFORMATIONS & COORDONNEES -->
			<div class="row">  
				<div class="panel panel-default  col-xs-offset-2 col-xs-8">			
					<div class="panel-heading">Informations personnelles et coordonnees</div>				
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
								<thead>
									<tr>
										<th colspan="12"></th>
										<th>CV</th>
									</tr>
								</thead>
								<tbody>
									<tr>	
										<td colspan="2">Prenom :</td>
										<td colspan="10"><?php if($memb != NULL)  echo $memb->getPrenomMembre()?></td>
										<td>
											<input type="checkbox" checked="checked" name="prenom" value="<?php if($memb != NULL)  echo $memb->getPrenomMembre()?>" />
										</td>
									</tr>
									<tr>	
										<td colspan="2">Nom :</td>
										<td colspan="10"><?php if($memb != NULL)  echo $memb->getNomMembre()?></td>
										<td>
											<input type="checkbox" checked="checked" name="nom" value="<?php if($memb != NULL)  echo $memb->getNomMembre()?>" />
										</td>
									</tr>
									<tr>	
										<td colspan="2">Courriel :</td>
										<td colspan="10"><?php if($memb != NULL)  echo $memb->getCourriel()?></td>
										<td>
											<input type="checkbox" checked="checked" name="courriel" value="<?php if($memb != NULL)  echo $memb->getCourriel()?>" />
										</td>
									</tr>
									<tr>	
										<td colspan="2">Tel. Domicile:</td>
										<td colspan="10"><?php if($memb != NULL) echo $memb->getTelDomicile()?></td>
										<td>
											<input type="checkbox" checked="checked" name="teldomicile" value="<?php if($memb != NULL)  echo $memb->getTelDomicile()?>" />
										</td>							
									</tr>
									<tr>	
										<td colspan="2">Tel. Cellulaire:</td>
										<td colspan="10"><?php if($memb != NULL) echo $memb->getTelCellulaire()?></td>
										<td>
											<input type="checkbox" checked="checked" name="telcellulaire" value="<?php if($memb != NULL)  echo $memb->getTelCellulaire()?>" />
										</td>							
									</tr>
									<tr>	
										<td colspan="2">Adresse :</td>
										<td colspan="10"><?php if($memb != NULL)  echo $memb->getAdNoCivique().", ".$memb->getAdNomRue()?></td>
										<td>
											<input type="checkbox" checked="checked" name="adresse" value="<?php if($memb != NULL)  echo $memb->getAdNoCivique().", ".$memb->getAdNomRue()?>" />
										</td>
									</tr>
									<?php
										if($memb->getAdNoApp() != NULL){
									?>
									<tr>	
										<td colspan="2">Appartement :</td>
										<td colspan="10"><?php if($memb != NULL)  echo $memb->getAdNoApp()?></td>							
										<td>
											<input type="checkbox" checked="checked" name="appartement" value="<?php if($memb != NULL)  echo $memb->getAdNoApp()?>" />
										</td>							
									</tr>
									<?php
										}
									?>
									<?php
										if($memb->getVille() != NULL){
									?>
									<tr>	
										<td colspan="2">Ville :</td>
										<td colspan="10"><?php if($memb != NULL)  echo $memb->getVille()?></td>							
										<td>
											<input type="checkbox" checked="checked" name="ville" value="<?php if($memb != NULL)  echo $memb->getVille()?>" />
										</td>							
									</tr>
									<?php
										}
									?>
									<?php
										if($memb->getCp() != NULL){
									?>
									<tr>	
										<td colspan="2">Code Postal :</td>
										<td colspan="10"><?php if($memb != NULL)  echo $memb->getCp()?></td>							
										<td>
											<input type="checkbox" checked="checked" name="codepostal" value="<?php if($memb != NULL)  echo $memb->getCp()?>" />
										</td>							
									</tr>
									<?php
										}
									?>
									<tr>	
										<td colspan="2">Pages Web :</td>
										<td colspan="10"><?php if($memb != NULL)  echo $memb->getPageWeb() ?></td>
										<td>
											<input type="checkbox" checked="checked" name="pageweb" value="<?php if($memb != NULL)  echo $memb->getPageWeb()?>" />
										</td>							
									</tr>
								</tbody>
							</table>					
						</div>					
					</div>				
				</div>
			</div>
			<!-- FIN AFFICHAGE DES INFORMATIONS & COORDONNEES -->
		
			<!-- AFFICHAGE DES EMPLOIS & TACHES -->		
			
			<?php	
				require_once('./Modele/ExpProDAO.php');	
				require_once('./Modele/Classes/ExpPro.php');
				require_once('./Modele/Classes/listeExpPro.php');
				require_once('./Modele/TacheDAO.php');	
				require_once('./Modele/Classes/Tache.php');
				require_once('./Modele/Classes/listeTaches.php');	
				$daoEP = new ExpProDAO();
				$daoT = new TacheDAO();
				$listeEP = $daoEP->findAll($id);				
			?>
			
			<div class="row">  
				<div class="panel panel-default col-xs-offset-2 col-xs-8">
					<div class="panel-heading">Experiences professionnelles (les emplois pour lesquels il n'y a pas de taches sont exclus de la liste)</div>
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
								<thead>
									<tr>
										<th>Poste</th>
										<th>Employeur</th>
										<th>De</th>
										<th>A</th>
										<th colspan="2">Taches</th>
										<th>CV</th>
									</tr>
								</thead>
								<tbody>
								<?php
									while ($listeEP->next()){
										$ep = $listeEP->getCurrent();
										if($ep != NULL){
								?>			
									<tr bgcolor="#d1deff">	
										<td><?php if($ep != NULL)  echo $ep->getPoste()?></td>
										<td><?php if($ep != NULL)  echo $ep->getEntreprise()?></td>
										<td><?php if($ep != NULL)  echo $ep->getDateDebutEP()?></td>
										<td><?php if($ep != NULL)  echo $ep->getDateFinEP()?></td>
										<td></td>
									</tr>
									<?php	
											$idT = $ep->getIdExpPro();
											$listeT=$daoT->findAll($idT);
												while ($listeT->next()){
													$t = $listeT->getCurrent();
													if($t != NULL){
								?> 
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td colspan="2"><?php if($t != NULL)  echo $t->getNomTache()?></td>
										<td>
											<input type="checkbox" checked="checked" name="experience[]" value="<?php if($ep != NULL)  echo $ep->getIdExpPro()?>" />
										</td>
									</tr>
								<?php
									}}}}
								?>	
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			<!-- FIN AFFICHAGE DES EMPLOIS & TACHES --> 
		
			<!-- AFFICHAGE DES FORMATIONS -->
			<?php
				require_once('./Modele/FormationDAO.php');	
				require_once('./Modele/Classes/Formation.php');
				require_once('./Modele/Classes/listeFormations.php');
				$daoF = new FormationDAO();
				$listeF = $daoF->findAll($id);
			?>
			<div class="row">  
				<div class="panel panel-default col-xs-offset-2 col-xs-8">
					<div class="panel-heading">Formations</div>
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
								<thead>
									<tr>
										<th>Titre</th>
										<th>Diplome</th>
										<th>Etablissement</th>
										<th>Annee</th>
										<th colspan="2">Description</th>
										<th>CV</th>
									</tr>
								</thead>
								<tbody>
								<?php
									while ($listeF->next()){
										$f = $listeF->getCurrent();
										if($f != NULL){
								?>
									<tr>	
										<td><?php if($f != NULL)  echo $f->getTitreFormation()?></td>
										<td><?php if($f != NULL)  echo $f->getNomDiplome()?></td>
										<td><?php if($f != NULL)  echo $f->getEtablissement()?></td>
										<td><?php if($f != NULL)  echo $f->getDateFinF()?></td> 
										<td colspan="2"><?php if($f != NULL)  echo $f->getDescFormation()?></td>
										<td>
											<input type="checkbox" checked="checked" name="formation[]" value="<?php echo $f->getIdFormation()?>" />
										</td>
									</tr>
									<?php
										}}
									?>	
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- FIN AFFICHAGE DES FORMATIONS -->
		
			<!-- AFFICHAGE DES COMPETENCES -->
			<?php
				require_once('./Modele/CompetenceDAO.php');	
				require_once('./Modele/Classes/Competence.php');
				require_once('./Modele/Classes/listeCompetences.php');
				$daoC = new CompetenceDAO();
				$listeC = $daoC->findAll($id);		
			?>
			<div class="row">  
				<div class="panel panel-default col-xs-offset-2 col-xs-8">
					<div class="panel-heading">Competences</div>
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
								<thead>
									<tr>
										<th colspan="12">Description des competences</th>
										<th>CV</th>
									</tr>
								</thead>
								<tbody>
								<?php
									while ($listeC->next()){
									$c = $listeC->getCurrent();
									if($c != NULL){
								?>
									<tr>	
										<td colspan="12"><?php if($c != NULL)  echo $c->getDescCompetence()?></td>
										<td>
											<input type="checkbox" checked="checked" name="competence[]" value="<?php if($c != NULL)  echo $c->getDescCompetence()?>" />
										</td>							
									</tr>
									<?php
										}}
									?>	
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- FIN AFFICHAGE DES COMPETENCES -->
		
			<!-- AFFICHAGE DES OBJECTIFS -->
			<?php
				require_once('./Modele/ObjectifDAO.php');	
				require_once('./Modele/Classes/Objectif.php');
				require_once('./Modele/Classes/listeObjectifs.php');
				$daoO = new ObjectifDAO();
				$id = $_SESSION['NoMembre'];
				$obj = $daoO->find($id);
			?>
			<div class="row">  
				<div class="panel panel-default col-xs-offset-2 col-xs-8">
					<div class="panel-heading">Objectif</div>
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
								<thead>
									<tr>
										<th colspan="12">Objectif professionnel</th>
										<th>CV</th>
									</tr>
								</thead>
								<tbody>
									<tr>	
										<?php if($obj != NULL){ ?>
										<td colspan="12"><?php echo $obj->getDescObjectif()?></td>
										<td>
											<input type="checkbox" checked="checked" name="objectif" value="<?php if($obj != NULL)  echo $obj->getDescObjectif()?>" />
										</td>
										<?php } ?>	
										<?php if($obj == NULL){ ?>
										<td colspan="12"></td>							
										<?php } ?>	
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- FIN AFFICHAGE DES OBJECTIFS -->
		
			<!-- AFFICHAGE DES AUTRES SECTIONS -->
			<?php
				require_once('./Modele/AutresSectionsDAO.php');	
				require_once('./Modele/Classes/Section.php');
				require_once('./Modele/Classes/listeAutresSections.php');
				$daoS = new AutresSectionsDAO();
				$id = $_SESSION['NoMembre'];
				$listeS = $daoS->findAll($id);
			?>
			<div class="row">  
				<div class="panel panel-default col-xs-offset-2 col-xs-8">
					<div class="panel-heading">Autres sections</div>
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
								<thead>
									<tr>
										<th colspan="2">Nom</th>
										<th colspan="10">Description</th>
										<th>CV</th>
									</tr>
								</thead>
								<tbody>
								<?php
									while ($listeS->next()){
										$s = $listeS->getCurrent();
										if($s != NULL){
								?>
									<tr>	
										<td colspan="2"><?php if($s != NULL)  echo $s->getNomSection()?></td>
										<td colspan="10"><?php if($s != NULL)  echo $s->getDescSection()?></td>
										<td>
											<input type="checkbox" checked="checked" name="autresection[]" value="<?php if($s != NULL)  echo $s->getIdSection()?>" />
										</td>
									</tr>
									<?php
										}}
									?>	
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
		<!--FIN AFFICHAGE DES AUTRES SECTIONS -->		
	<hr />
	<?php
		include("/Vues/footer.php");
	?>
	</div> 
 </body>
 </html>