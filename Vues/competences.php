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
		require_once('./Modele/CompetenceDAO.php');	
		require_once('./Modele/Classes/Competence.php');
		require_once('./Modele/Classes/listeCompetences.php');
		$daoC = new CompetenceDAO();
		$id = $_SESSION['NoMembre'];			
	?>
		<div class="container">
			<form action="" method="post">
				<div class="row">
					<div class="col-xs-offset-3 col-xs-8">
						<h3 id="txProfil"><?php echo $_SESSION['alias'] ?>, ici vous pouvez entrer vos compétences</h3>
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
				<div class="col-xs-2"></div>	
				<div class="panel panel-primary col-sm-8">
					<div class="panel-heading">Compétences</div>
					<?php			
						$listeC = $daoC->findAll($id);
						while ($listeC->next()){
							$competence = $listeC->getCurrent();
					?>			
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
							<?php						
							$comp1 = "";
							if (ISSET($_REQUEST["competence1"]))
								$comp1 = $_REQUEST["competence1"];				
							$comp2 = "";
							if (ISSET($_REQUEST["competence2"]))
								$comp2 = $_REQUEST["competence2"];
							?>
								<form method="POST" action=" ">
									<br />
									<tbody>
									<?php		
										if ($competence != NULL) {
									?>								
										<tr>
											<td>Compétence : </td>
											<td >
												<input class="textBox2" type="text" name="competence1" 
												<?php if($competence!=NULL){?> value="<?php echo $competence->getDescCompetence() ?>" <?php } else ?> value=""
												<?php if($comp1!=NULL){ ?> value="<?php echo $comp1 ?>" <?php } ?> />
												<?php 
													$idCompetence = $competence->getIdCompetence(); 
												?>
												<input type="hidden" name="idComp" value="<?php echo $idCompetence ?>" />	
												<input name="action" value="enregistrerComp" type="hidden" />
												<input class="btn btn-success" type="submit" name="edit" value="Sauver" />
												<input class="btn btn-primary" type="submit" name="sup" value="Supprimer" />
											</td>
										</tr>						
										<?php
											}
										?>
									</tbody>
								</form>	
								<?php
									if($competence == null){
								?>					
								<form method="POST" action=" ">
								<thead></thead>
									<br />
									<tbody>	
										<tr>
											<td>Compétence : </td>
											<td>
												<input class="textBox2" type="text" name="competence2" 										
												<?php if($comp2!=NULL){ ?> value="<?php echo $comp1 ?>" <?php } ?> />
												<input name="action" value="enregistrerComp" type="hidden" />
												<input class="btn btn-success" type="submit" name="ajouter" value="Sauver" />						
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
		
	<div class="row"><hr /></div>
	<br />
	<?php
		include("/footer.php");
	?>
	</div>	
 </body>
 </html>	
				
				
				