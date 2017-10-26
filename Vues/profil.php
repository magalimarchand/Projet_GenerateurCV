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
						<h3 id="txProfil"><?php echo $_SESSION['alias'] ?>, ici vous pouvez entrer vos informations personnelles</h3>
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
			<div class="row">
				<div class="col-xs-2">
				<?php
					require_once('./Modele/MembreDAO.php');	
					require_once('./Modele/Classes/Membre.php');	

					$daoM = new MembreDAO();			
					$req = $daoM->find($_SESSION['alias']);	
	
					if($req != NULL){
						$id = $req->getIdMembre();
						$alias = $req->getAlias();
						$mdp = $req->getMdp();
						$nom = $req->getNomMembre();
						$prenom =$req->getPrenomMembre();
						$telDom = $req->getTelDomicile();
						$telCell = $req->getTelCellulaire();
						$noAdd =$req->getAdNoCivique();
						$nomRue = $req->getAdNomRue();
						$appart = $req->getAdNoApp();
						$ville = $req->getVille();
						$codePostal = $req->getCp();
						$courriel = $req->getCourriel();
						$pWeb = $req->getPageWeb();
				
						$_SESSION['NoMembre'] = $id;
					}				
				?>
				</div>
		<!-- AFFICHAGE DES INFORMATIONS PERSONNELLES -->
				<div class="panel panel-primary col-sm-8">
					<div class="panel-heading">Informations personnelles et coordonnees</div>
					<div class="panel-body">
						<div class="col-sm-12">
							<table class="table">
								<tbody>			
									<form method="POST" action=''>
										<tr>	
											<td colspan="2">Prenom :</td>
											<td colspan="10"><input class="textBox1" type="text" name="prenom" 
												<?php if($prenom!=NULL){?> value="<?php echo $prenom ?>" <?php } else ?> value=""/>
											</td>
										</tr>
										<tr>	
											<td colspan="2">Nom :</td>
											<td colspan="10"><input class="textBox1" type="text" name="nom" 
												<?php if($nom!=NULL){?> value="<?php echo $nom ?>" <?php } else ?> value=""/>
											</td>
										</tr>
										<tr>	
											<td colspan="2">Courriel :</td>
											<td colspan="10"><input class="textBox1" type="text" name="courriel" 
												<?php if($courriel!=NULL){?> value="<?php echo $courriel ?>" <?php } else ?> value=""/>
												<?php
													if (ISSET($_REQUEST["field_messages"]["courriel"]))
													echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["courriel"]."</span>";
												?>
											</td>
										</tr>
										<tr>	
											<td colspan="2">Tel. Domicile :</td>
											<td colspan="10"><input class="textBox1" type="text" name="telD" placeholder="000-000-0000"
												<?php if($telDom!=NULL){?> value="<?php echo $telDom ?>" <?php } else ?> value=""/>													
												<?php
													if (ISSET($_REQUEST["field_messages"]["telD"]))
													echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["telD"]."</span>";
												?>
											</td>
										</tr>
										<tr>	
											<td colspan="2">Tel. Cellulaire :</td>
											<td colspan="10"><input class="textBox1" type="text" name="telC" placeholder="000-000-0000"
												<?php if($telCell!=NULL){?> value="<?php echo $telCell ?>" <?php } else ?> value=""/>
												<?php
													if (ISSET($_REQUEST["field_messages"]["telC"]))
													echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["telC"]."</span>";
												?>
											</td>
										</tr>
										<tr>	
											<td colspan="2">No civique :</td>
											<td colspan="10"><input class="textBox1" type="text" name="adNo" 
												<?php if($noAdd!=NULL){?> value="<?php echo $noAdd ?>" <?php } else ?> value=""/>
											</td>
										</tr>
										<tr>	
											<td colspan="2">Rue :</td>
											<td colspan="10"><input class="textBox1" type="text" name="nomRue" 
												<?php if($nomRue!=NULL){?> value="<?php echo $nomRue ?>" <?php } else ?> value=""/>
											</td>
										</tr>
										<tr>	
											<td colspan="2">Appartement :</td>
											<td colspan="10"><input class="textBox1" type="text" name="appart" 
												<?php if($appart!=NULL){?> value="<?php echo $appart ?>" <?php } else ?> value=""/>
											</td>
										</tr>
										<tr>	
											<td colspan="2">Ville :</td>
											<td colspan="10"><input class="textBox1" type="text" name="ville" 
												<?php if($ville!=NULL){?> value="<?php echo $ville ?>" <?php } else ?> value=""/>
											</td>
										</tr>	
										<tr>	
											<td colspan="2">Code Postal :</td>
											<td colspan="10"><input class="textBox1" type="text" name="cp" placeholder="A0A 0A0"
												<?php if($codePostal!=NULL){?> value="<?php echo $codePostal ?>" <?php } else ?> value=""/>
											</td>
										</tr>
										<tr>	
											<td colspan="2">Pages Web :</td>
											<td colspan="10"><input class="textBox2" type="text" name="pageweb" 
												<?php if($pWeb!=NULL){?> value="<?php echo $pWeb ?>" <?php } else ?> value=""/>
											</td>
										</tr>						
										<tr>
											<td colspan="4">
												<input name="action" value="editerInfo" type="hidden" />
												<input class="btn btn-success" type="submit" name="Enr" value="Enregistrer" />
											</td>
										</tr>
									</form>
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
	</div>		
 </body>
 </html>