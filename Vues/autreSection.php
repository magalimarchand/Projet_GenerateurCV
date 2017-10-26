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
		require_once('./Modele/AutresSectionsDAO.php');	
		require_once('./Modele/Classes/Section.php');
		require_once('./Modele/Classes/listeAutresSections.php');
		$daoS = new AutresSectionsDAO();
		$id = $_SESSION['NoMembre'];		
	?>
		<div class="container">
			<form action="" method="post">
				<div class="row">
					<div class="col-xs-offset-3 col-xs-8">
						<h3 id="txProfil"><?php echo $_SESSION['alias'] ?>, ici vous pouvez ajouter des sections de votre choix</h3>
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
					<div class="panel-heading">Autres Sections</div>
				<?php			
				$listeS = $daoS->findAll($id);
				while ($listeS->next()){
					$sec = $listeS->getCurrent();
				?>			
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
							<?php						
								$nom = "";
								$desc = "";
								if (ISSET($_REQUEST["nomSection1"]))
									$nom = $_REQUEST["nomSection1"];
								if (ISSET($_REQUEST["description1"]))
									$desc = $_REQUEST["description1"];				
								$nom2 = "";
								$desc2 = "";
								if (ISSET($_REQUEST["nomSection2"]))
									$nom2 = $_REQUEST["nomSection2"];
								if (ISSET($_REQUEST["description2"]))
									$desc2 = $_REQUEST["description2"];
							?>
								<form method="POST" action=" ">
								<br />
									<tbody>
									<?php		
										if ($sec != NULL) {
									?>								
										<tr>
											<td>Nom de section </td>
											<td >
												<input class="textBox1" type="text" name="nomSection1" 
												<?php if($sec!=NULL){?> value="<?php echo $sec->getNomSection() ?>" <?php } else ?> value=""
												<?php if($sec!=NULL){ ?> value="<?php echo $nom ?>" <?php } ?> />
											</td>
										</tr>
										<tr>
											<td>Description </td>
										</tr>
										<tr>
											<td colspan="8"><textarea name="description1" rows="10" cols="75"><?php if($sec!=NULL){?> <?php echo $sec->getDescSection() ?><?php } ?> 
												<?php if($sec!=NULL){ ?><?php echo $desc ?><?php } ?></textarea>
											</td>
										</tr>							
									<?php 
										$idSection = $sec->getIdSection(); 
									?>
										<tr>
											<td>
												<input type="hidden" name="idSec" value="<?php echo $idSection ?>" />	
												<input name="action" value="enrSection" type="hidden" />
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
									if($sec == null){
								?>					
								<form method="POST" action=" ">
								<thead></thead>
								<br />
									<tbody>	
										<tr>
											<td>Nom de section </td>
											<td>
												<input class="textBox1" type="text" name="nomSection2" 										
												<?php if($nom2!=NULL){ ?> value="<?php echo $nom2 ?>" <?php } ?> />
											</td>
										</tr>
										<tr>
											<td>Description </td>
										</tr>
										<tr>
											<td colspan="8"><textarea name="description2" rows="10" cols="75"><?php echo $desc2 ?></textarea></td>
										</tr>							
										<tr>
											<td>
												<input name="action" value="enrSection" type="hidden" />
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
		
	<div class="row"><hr /></div>
	<br />
	<?php
	include("/footer.php");
	?>
 </div>	
 </body>
 </html>	
				
				
				