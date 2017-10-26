 <!DOCTYPE html>
 <html>
 <head>
	<title>Pro CV - Profil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./CSS/MonStyle01.css">
 </head>
 <body>
	<div>
	<?php
		include("/banniere.php");		
		require_once('./Modele/FormationDAO.php');	
		require_once('./Modele/Classes/Formation.php');
		require_once('./Modele/Classes/listeFormations.php');
		$daoF = new FormationDAO();
		$id = $_SESSION['noMembre'];
	?>
		<div class="container">
			<form action="" method="post">
				<div class="row">
					<div class="col-xs-offset-3 col-xs-8">
						<h3 id="txProfil"><?php echo $_SESSION['alias'] ?>, ici vous pouvez entrer vos formations</h3>
					</div>				
					<div class="col-xs-1">
						<a href="?action=deconnecter">Deconnexion</a>
					</div>	
				</div>
			</form>
			<hr />
		
		<!-- AFFICHAGE DU MENU DE NAVIGATION -->
			<?php
				include("/menuProfil.php");		
			?>
		<!-- FIN AFFICHAGE DU MENU DE NAVIGATION -->
		
			<div class="row">
				<div class="col-xs-2"></div>	
				<div class="panel panel-primary col-sm-8">
					<div class="panel-heading">Formations</div>
					<?php			
						$listeF = $daoF->findAll($id);
						while ($listeF->next()){
							$f = $listeF->getCurrent();
					?>			
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
							<?php						
								$titre = "";
								$diplom = "";
								$ecole = "";
								$dateFin = "";
								$desc = "";
								if (ISSET($_REQUEST["titre1"]))
									$titre = $_REQUEST["titre1"];
								if (ISSET($_REQUEST["diplome1"]))
									$diplom = $_REQUEST["diplome1"];
								if (ISSET($_REQUEST["etablissement1"]))
									$ecole = $_REQUEST["etablissement1"];
								if (ISSET($_REQUEST["date1"]))
									$dateFin = $_REQUEST["date1"];
								if (ISSET($_REQUEST["descForm1"]))
									$desc = $_REQUEST["descForm1"];
				
								$titre2 = "";
								$diplom2 = "";
								$ecole2 = "";
								$dateFin2 = "";
								$desc2 = "";
								if (ISSET($_REQUEST["titre2"]))
									$titre2 = $_REQUEST["titre2"];
								if (ISSET($_REQUEST["diplome2"]))
									$diplom2 = $_REQUEST["diplome2"];
								if (ISSET($_REQUEST["etablissement2"]))
									$ecole2 = $_REQUEST["etablissement2"];
								if (ISSET($_REQUEST["date2"]))
									$dateFin2 = $_REQUEST["date2"];
								if (ISSET($_REQUEST["descForm2"]))
									$desc2 = $_REQUEST["descForm2"];
							?>
								<form method="POST" action=" ">
									<br />
									<tbody>
									<?php		
										if ($f != NULL) {
									?>								
										<tr>
											<td>Titre </td>
											<td ><input class="textBox1" type="text" name="titre1" 
												<?php if($f!=NULL){?> value="<?php echo $f->getTitreFormation() ?>" <?php } else ?> value=""
												<?php if($titre!=NULL){ ?> value="<?php echo $titre ?>" <?php } ?> />
											</td>
											<td>Diplome </td>
											<td ><input class="textBox1" type="text" name="diplome1" 
												<?php if($f!=NULL){?> value="<?php echo $f->getNomDiplome() ?>" <?php } else ?> value=""
												<?php if($diplom!=NULL){ ?> value="<?php echo $diplom ?>" <?php } ?> />
											</td>
										</tr>
										<tr>
											<td>Etablissement </td>
											<td ><input class="textBox1" type="text" name="etablissement1" 
												<?php if($f!=NULL){?> value="<?php echo $f->getEtablissement() ?>" <?php } else ?> value=""
												<?php if($ecole!=NULL){ ?> value="<?php echo $ecole ?>" <?php } ?> />
											</td>
											<td>Annee </td>
											<td ><input class="textBox1" type="text" name="date1" 
												<?php if($f!=NULL){?> value="<?php echo $f->getDateFinF() ?>" <?php } else ?> value=""
												<?php if($dateFin!=NULL){ ?> value="<?php echo $dateFin ?>" <?php } ?> />
											</td>
										</tr>
										<tr>
											<td>Description </td>
										</tr>
										<tr>
											<td colspan="8"><textarea name="descForm1" rows="10" cols="75"><?php if($f!=NULL){?> <?php echo $f->getDescFormation() ?><?php } ?> 
												<?php if($desc!=NULL){ ?><?php echo $desc ?><?php } ?></textarea>
											</td>
										</tr>							
										<?php 
											$idForm = $f->getIdFormation(); 
										?>
										<tr>
											<td colspan="8">
												<input type="hidden" name="idForm" value="<?php echo $idForm ?>" />	
												<input name="action" value="enregistrerFormation" type="hidden" />
												<input class="btn btn-success" type="submit" name="edit" value="Enregistrer" />
												<input class="btn btn-primary" type="submit" name="sup" value="Supprimer" />
											</td>
										</tr>
										<?php
											}
										?>
									</tbody>
								</form>	
								<?php
									if($f == null){
								?>					
								<form method="POST" action=" ">
									<br />
									<tbody>	
										<tr>
											<td>Titre </td>
											<td><input class="textBox1" type="text" name="titre2" 										
												<?php if($titre2!=NULL){ ?> value="<?php echo $titre2 ?>" <?php } ?> />
											</td>
											<td>Diplome </td>
											<td ><input class="textBox1" type="text" name="diplome2" 									
												<?php if($diplom2!=NULL){ ?> value="<?php echo $diplom2 ?>" <?php } ?> />
											</td>
										</tr>
										<tr>
											<td>Etablissement </td>
											<td ><input class="textBox1" type="text" name="etablissement2" 									
												<?php if($ecole2!=NULL){ ?> value="<?php echo $ecole2 ?>" <?php } ?> />
											</td>
											<td>Annee </td>
											<td ><input class="textBox1" type="text" name="date2" placeholder="AAAA"									
												<?php if($dateFin2!=NULL){ ?>value="<?php echo $dateFin2 ?>" <?php } ?> />
											</td>
										</tr>
										<tr>
											<td>Description </td>
										</tr>
										<tr>
											<td colspan="8"><textarea name="descForm2" rows="10" cols="75"><?php echo $desc2 ?></textarea></td>
										</tr>							
										<tr>
											<td>
												<input name="action" value="enregistrerFormation" type="hidden" />
												<input class="btn btn-success" type="submit" name="ajouter" value="Enregistrer" />
											</td>
										</tr>
									</tbody>
								</form>
								<?php
									}}
								?>	
							</table>
						</div>
					</div>
				</div>	
				<hr />
			</div>
		</div>			
		<br />
		<?php
			include("/footer.php");
		?>
	</div>	
 </body>
 </html>	
				
				
				