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
		require_once('./Modele/ObjectifDAO.php');	
		require_once('./Modele/Classes/Objectif.php');
		require_once('./Modele/Classes/listeObjectifs.php');
		$daoO = new ObjectifDAO();
		$id = $_SESSION['NoMembre'];

		$obj = $daoO->find($id);
		if($obj != NULL){
			$idObj = $obj->getIdObjectif();
			$descObj = $obj->getDescObjectif();
			$noMembre = $obj->getNoMembre();			
		}
	?>
		<div class="container">
			<form action="" method="post">
				<div class="row">
					<div class="col-xs-offset-3 col-xs-8">
						<h3 id="txProfil"><?php echo $_SESSION['alias'] ?>, ici vous pouvez entrer vos objectifs professionnels</h3>
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
					<div class="panel-heading">Objectif professionnel</div>
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
							<?php
								$o = "";						
								if (ISSET($_REQUEST["objectif"]))
									$o = $_REQUEST["objectif"];	
							?>						
								<form method="POST" action=" ">
									<br />
									<tbody>	
									<?php if($o!=NULL){?>
										<tr>	
											<td colspan="8">
												<?php if($obj!=NULL){?>
												<textarea name="objectif" rows="10" cols="75"><?php if($descObj!=NULL){?> <?php echo $descObj?><?php } ?></textarea>
												<?php } ?>
												<?php 
													$idObj = $obj->getIdObjectif();
												  ?>								
												<?php if($obj==NULL){?>
												<textarea name="objectif" rows="10" cols="75"><?php if($o!=NULL){?> <?php echo $o ?> <?php } else ?></textarea>
												<?php } ?>
											</td>
										</tr>
										<?php
											}
										?>
										<?php if($o==NULL){?>
										<tr>	
											<td colspan="8">
												<?php if($obj!=NULL){?>
												<textarea name="objectif" rows="10" cols="75"><?php if($descObj!=NULL){?> <?php echo $descObj?><?php } ?></textarea>
												<?php } ?>
												<?php if($obj==NULL){?>
												<textarea name="objectif" rows="10" cols="75"><?php if($o!=NULL){?> <?php echo $o ?> <?php } else ?></textarea>
												<?php } ?>
											</td>	
										</tr>
										<tr>
											<td>												
												<input name="action" value="enrObjectif" type="hidden" />
												<input class="btn btn-success" type="submit" name="enregistrer" value="Enregistrer" />
											<?php if($obj!=NULL){?>
												<input type="hidden" name="numO" value="<?php echo $obj->getIdObjectif() ?>" />	
												<input class="btn btn-primary" type="submit" name="sup" value="Supprimer" />
											<?php } ?>
											</td>
										</tr>
										<?php
											}
										?>
									</tbody>
								</form>
							</table>
						</div>
					</div>
				</div>	
				<hr />
			</div>
		</div>		
		<?php
			include("/footer.php");
		?>
	</div>	
 </body>
 </html>