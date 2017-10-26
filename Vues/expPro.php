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
		require_once('./Modele/ExpProDAO.php');	
		require_once('./Modele/Classes/ExpPro.php');
		require_once('./Modele/Classes/listeExpPro.php');
		require_once('./Modele/TacheDAO.php');	
		require_once('./Modele/Classes/Tache.php');
		require_once('./Modele/Classes/listeTaches.php');
	
		$daoEP = new ExpProDAO();
		$daoT = new TacheDAO();
		$id = $_SESSION['noMembre'];
		$listeEP = $daoEP->findAll($id);
	?>
	<div class="container">
		<form action="" method="post">
			<div class="row">
				<div class="col-xs-offset-3 col-xs-8">
					<h3 id="txProfil"><?php echo $_SESSION['alias'] ?>, ici vous pouvez entrer vos expériences professionnelles</h3>
				</div>				
				<div class="col-xs-1">
					<a href="?action=deconnecter">Deconnexion</a>
				</div>	
			</div>
		</form>
		<hr />
		<?php
			include("/menuProfil.php");		
		?>
		<div class="row">
			<div class="col-xs-1"></div>	
			<div class="panel panel-primary col-sm-9">
				<div class="panel-heading">Experiences professionnelles</div>
			<?php
				while ($listeEP->next()){
					$ep = $listeEP->getCurrent();
				if($ep != NULL){
					$idT = $ep->getIdExpPro();
					$listeT=$daoT->findAll($idT);}
			
				$pos = "";
				$dateD = "";
				$dateF = "";
				$entrepris = "";					
				$task = "";	
				if (ISSET($_REQUEST["tache"]))
					$task = $_REQUEST["tache"];
				if (ISSET($_REQUEST["poste"]))
					$pos = $_REQUEST["poste"];
				if (ISSET($_REQUEST["dateDEP"]))
					$dateD = $_REQUEST["dateDEP"];
				if (ISSET($_REQUEST["dateFEP"]))
					$dateF = $_REQUEST["dateFEP"];
				if (ISSET($_REQUEST["entreprise"]))
					$entrepris = $_REQUEST["entreprise"];	
		
				$pos2 = "";
				$dateD2 = "";
				$dateF2 = "";
				$entrepris2 = "";
				$task2 = "";
				if (ISSET($_REQUEST["poste2"]))
					$pos2 = $_REQUEST["poste2"];
				if (ISSET($_REQUEST["dateDEP2"]))
					$dateD2 = $_REQUEST["dateDEP2"];
				if (ISSET($_REQUEST["dateFEP2"]))
					$dateF2 = $_REQUEST["dateFEP2"];
				if (ISSET($_REQUEST["entreprise2"]))
					$entrepris2 = $_REQUEST["entreprise2"];
				if (ISSET($_REQUEST["tache2"]))
					$task2 = $_REQUEST["tache2"];

				?>
				<div class="panel-body">
					<div class="col-sm-12">
						<table class="table">
							<form method="POST" action=" ">
							<br />
								<tbody>	
								<?php if($ep != NULL){ ?>
								<?php $idExpPro = $ep->getIdExpPro(); ?>
									<tr>
										<td colspan="8">
											<input type="hidden" name="idEP" value="<?php echo $idExpPro ?>" />
											<input name="action" value="enregistrerEP" type="hidden" />
											<input class="btn btn-success" id="editEx" type="submit" name="editerEP" value="Enregistrer" />										
											<input class="btn btn-primary" type="submit" name="sup" value="Supprimer" />
										</td>
									</tr>
									<tr>	
										<td>Poste </td>
										<td ><input class="textBox1" type="text" name="poste" 
											<?php if($ep!=NULL){?> value="<?php echo $ep->getPoste() ?>" <?php } else ?> value=""
											<?php if($pos!=NULL){ ?> value="<?php echo $pos ?>" <?php } ?> />
										</td>	
										<td>Entreprise </td>
										<td ><input class="textBox1" type="text" name="entreprise" 
											<?php if($ep!=NULL){?> value="<?php echo $ep->getEntreprise() ?>" <?php } else ?> value=""
											<?php if($entrepris!=NULL){ ?> value="<?php echo $entrepris ?>" <?php } ?> />
										</td>
									</tr>
									<tr>	
										<td>De</td>
										<td ><input class="textBox1" type="text" name="dateDEP" placeholder="AAAA-MM-JJ"
											<?php if($ep!=NULL){?> value="<?php echo $ep->getDateDebutEP() ?>" <?php } else ?> value=""
											<?php if($dateD!=NULL){ ?> value="<?php echo $dateD ?>" <?php } ?> />
										</td>
										<td>A</td>
										<td ><input class="textBox1" type="text" name="dateFEP" placeholder="AAAA-MM-JJ"
											<?php if($ep!=NULL){?> value="<?php echo $ep->getDateFinEP() ?>" <?php } else ?> value=""
											<?php if($dateF!=NULL){ ?> value="<?php echo $dateF ?>" <?php } ?> />
										</td>
									</tr>
									<?php
										while ($listeT->next()){
											$t = $listeT->getCurrent();
										if ($t != NULL){
											
											$idEx = $ep->getIdExpPro();								
									?>
									<tr>
										<td>Tache</td>
										<td colspan="7">
											<input class="textBox3" type="text" name="tache" 
											<?php if($t!=NULL){?> value="<?php echo $t->getNomTache() ?>"<?php } ?>
											<?php $idTache = $t->getIdTache(); ?>
											<?php if($task!=NULL){ ?> value="<?php echo $task ?>" <?php } ?> />
										</td>									
										<td>								
											<input type="hidden" name="idTa" value="<?php echo $idTache ?>" />
											<input type="hidden" name="idEP" value="<?php echo $idEx ?>" />
											<input name="action" value="enregistrerEP" type="hidden" />
											<input class="btn btn-success" id="editTask" type="submit" name="editerT" value="Enr." />										
											<input class="btn btn-primary" type="submit" name="supT" value="Sup." />
										</td>								
									</tr>								
									<?php  }?>	
									<?php	if ($t == NULL){ ?>
									<?php $idEx = $ep->getIdExpPro(); ?>
									<tr>
										<td>Tache</td>
										<td colspan="7">
											<input class="textBox3" type="text" name="tache2" 
											<?php if($task2!=NULL){ ?> value="<?php echo $task2 ?>" <?php } ?> />
										</td>									
										<td>
											<input type="hidden" name="idEP" value="<?php echo $idEx ?>" />
											<input name="action" value="enregistrerEP" type="hidden" />
											<input class="btn btn-success" id="enrTask" type="submit" name="ajouterT" value="Enr." />
										</td>								
									</tr>	
								<?php }}} ?>
								</tbody>								
							</form>
							<?php
								if($ep == null){
							?>
							<form method="POST" action=" ">		
								<tr>
									<td>									
										<input name="action" value="enregistrerEP" type="hidden" />
										<input class="btn btn-success" type="submit" name="ajouterEP" value="Enregistrer" />										
									</td>
								</tr>
								<tr>	
									<td>Poste </td>
									<td ><input class="textBox1" type="text" name="poste" 
										<?php if($ep!=NULL){?> value="<?php echo $ep->getPoste() ?>" <?php } else ?> value=""
										<?php if($pos2!=NULL){ ?> value="<?php echo $pos2 ?>" <?php } ?> />
									</td>	
									<td>Entreprise </td>
									<td ><input class="textBox1" type="text" name="entreprise" 
										<?php if($ep!=NULL){?> value="<?php echo $ep->getEntreprise() ?>" <?php } else ?> value=""
										<?php if($entrepris2!=NULL){ ?> value="<?php echo $entrepris2 ?>" <?php } ?> />
									</td>
								</tr>
								<tr>	
									<td>De</td>
									<td ><input class="textBox1" type="text" name="dateDEP" placeholder="AAAA-MM-JJ"
										<?php if($ep!=NULL){?> value="<?php echo $ep->getDateDebutEP() ?>" <?php } else ?> value=""
										<?php if($dateD2!=NULL){ ?> value="<?php echo $dateD2 ?>" <?php } ?> />
									</td>
									<td>A</td>
									<td ><input class="textBox1" type="text" name="dateFEP" placeholder="AAAA-MM-JJ"
										<?php if($ep!=NULL){?> value="<?php echo $ep->getDateFinEP() ?>" <?php } else ?> value=""
										<?php if($dateF2!=NULL){ ?> value="<?php echo $dateF2 ?>" <?php } ?> />
									</td>
								</tr>	
							<?php
								}}
							?>	
							</form>
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