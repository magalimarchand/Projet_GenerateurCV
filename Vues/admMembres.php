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
		include("/Vues/banniere.php");		
	?>
		<div class="container">
			<form action="" method="post">
				<div class="row">
					<div class="col-xs-offset-3 col-xs-8">
						<h3 id="txProfil">Panneau d'administration</h3>
					</div>				
					<div class="col-xs-1">
						<a href="?action=deconnecter">Deconnexion</a>
					</div>	
				</div>
			</form>
			<hr />
	
	<!-- AFFICHAGE DU MENU DE NAVIGATION -->	
			<?php
				include("/Vues/menuProfil.php");
			?>
	<!-- FIN AFFICHAGE DU MENU DE NAVIGATION -->
	<!-- AFFICHAGE DU MENU D'ADMINISTRATION -->	
			<?php
				include("/Vues/menuAdmin.php");
			?>
		<!-- FIN AFFICHAGE D'ADMINISTRATION -->
			<div class="row">			
				<div class="col-xs-1">
				
				<?php
					require_once('./Modele/MembreDAO.php');	
					require_once('./Modele/Classes/Membre.php');	
					require_once('./Modele/Classes/listeMembres.php');

					$daoM = new MembreDAO();			
					$listeMemb = $daoM->findAll();	
				?>
				</div>
	
		<!-- AFFICHAGE DES INFORMATIONS PERSONNELLES -->
				<div class="panel panel-success col-sm-10">
					<div class="panel-heading">Liste des membres</div>
						<div class="panel-body">
							<div class="col-sm-12">
								<table class="table">								
									<tr>
										<th colspan="1">Id</th>
										<th colspan="2">Alias</th>
										<th colspan="2">Courriel</th>
										<th colspan="2">Nom</th>
										<th colspan="2">Prenom</th>
									</td>
									<tbody>												
										<?php 
										while ($listeMemb->next()){
											$memb = $listeMemb->getCurrent();
											if ($memb!=null){  
											?>
										<form method="POST" action=''>
										<tr>	
											<td colspan="1">
												<input type="text" size="3" name="idM" value="<?php echo $memb->getIdMembre()?>" readonly />
											</td>	
											<td colspan="2">
												<input type="text" size="12" name="aliasMemb" value="<?php echo $memb->getAlias()?>" readonly />
											</td>	
											<td colspan="2">
												<input type="text" size="18" name="emailM" value="<?php echo $memb->getCourriel()?>" readonly />
											</td>
											<td colspan="2">
												<input type="text" size="12" name="NomM" value="<?php echo $memb->getNomMembre()?>" readonly />
											</td>	
											<td colspan="2">
												<input type="text" size="12" name="PrenomM" value="<?php echo $memb->getPrenomMembre()?>" readonly />
											</td>	
											<?php if($memb->getAdministrateur() == 0){ ?>
											<td >
												<input type="hidden" name="aliasM" value="<?php echo $memb->getAlias() ?>" />	
												<input name="action" value="gestMemb" type="hidden" />
												<input type="submit" name="adm" class="btn btn-success" value="Admin" />
												<input type="hidden" name="idMemb" value="<?php echo $memb->getIdMembre() ?>" />
												<input name="action" value="gestMemb" type="hidden" />
												<input type="submit" name="supMemb" class="btn btn-danger" value="Supprimer" />
											</td> 
											<?php } ?>
										</tr>
										</form>
										<?php }} ?>										
									</tbody>
								
								</table>						
							</div>
						</div>
				</div>
		<!-- FIN DE L'AFFICHAGE DES INFORMATIONS PERSONNELLES -->			
			</div>
				<hr />
				<?php
					include("/Vues/footer.php");
				?>
		</div>	
 </body>
 </html>