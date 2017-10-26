<!DOCTYPE html>
<html>
<head>
	<title>Pro CV - Accueil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./CSS/MonStyle01.css">
</head>
<body id="top" onselectstart="return false" 
		oncontextmenu="return false" ondragstart="return false">  <!-- Empêcher le vol d'images sur la page -->
	<div>
	<?php
		include("/Vues/banniere.php");	
	?>
		<div>
			<div class="container">		
				<div class="row">
					<div class="col-xs-offset-10 col-xs-2">
						<p id="nonMembre">PAS ENCORE INSCRIT ?
							<span>
								<a href="?action=allerInscrip">Créer un nouveau compte</a>
							</span>
						</p>
					</div>			  
				</div>
				<br />
				<div class="row">
					<div class="col-md-2"><p class="">CV Chronologiques</p>
						<div class="row">
							<div class="col-md-12"></div>
							<div class="col-md-12 texte">Pertience : lorsque le poste convoité est directement relié à l'expérience professionnelle et que le parcours est continu (dans le même type d'emploi)</div>
						</div>
					</div>				
					<div class="col-xs-offset-1 col-xs-2">
						<img class="img-responsive" src="./ExemplesCV/Chrono01.jpg" alt="L'image ne s'affiche pas" />
					</div>
					<div class="col-xs-2">
						<img class="img-responsive" src="./ExemplesCV/Chrono02.jpg" alt="L'image ne s'affiche pas" />
					</div>
					<div class="col-xs-2">
						<img class="img-responsive" src="./ExemplesCV/Chrono03.jpg" alt="L'image ne s'affiche pas" />
					</div>
					<?php		
					if (ISSET($_REQUEST["global_message"]))
						$msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
					$u = "";
					$pw = "";
					if (ISSET($_REQUEST["username"]))
						$u = $_REQUEST["username"];
					if (ISSET($_REQUEST["password"]))
						$pw = $_REQUEST["password"];
					?>			
					<form action="" method="post">
						<div class="col-xs-offset-1 col-xs-2">
							<p>Nom d'utilisateur :<input type="text" name="username" value="<?php echo $u?>" /></p>
							<?php
							if (ISSET($_REQUEST["field_messages"]["username"]))
								echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
							?>
							<div class="row">
								<div class="col-xs-12">
									<p>Mot de passe :<input type="password" name="password" value="<?php echo $pw ?>" /></p>
									<?php
									if (ISSET($_REQUEST["field_messages"]["password"]))
										echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
									?>
									<div class="row">
										<div class="col-xs-12">
											<input name="action" value="connecter" type="hidden" />
											<input type="submit" value="Connexion" />
										</div>
									</div>
								</div>	
							</div>

						</div>
					</form>
				</div>		
				<hr />		
				<div class="row">
					<div class="col-md-2"><p class="">CV Compétences</p>
						<div class="row">
							<div class="col-md-12"></div>
							<div class="col-md-12 texte">Pertience : lorsque l'expérience est très diversifiée ou discontinue (absence du marché du travail ou expériences variées dans différents secteurs d'emploi)</div>
						</div>
					</div>
					<div class="col-xs-offset-1 col-xs-2">
						<img class="img-responsive" src="./ExemplesCV/Competences01.jpg" alt="L'image ne s'affiche pas" />
					</div>
					<div class="col-xs-2">
						<img class="img-responsive" src="./ExemplesCV/Competences02.png" alt="L'image ne s'affiche pas" />
					</div>
					<div class="col-xs-2">
						<img class="img-responsive" src="./ExemplesCV/Competences03.jpg" alt="L'image ne s'affiche pas" />
					</div>
					<div class="col-xs-offset-1 col-xs-2"><p class="">L'inscription vous permet</p>
						<div class="row">
							<div class="col-sx-12">
								<ul class="texte">
									<li>d'enregistrer, de modifier ou de supprimer vos informations personnelles et professionnelles;</li>
									<li>de générer un cv dans le style de votre choix;</li>
									<li>de télécharger votre cv en format PDF;</li>
									<li>d'évaluer les modèles;</li>
								</ul>
							</div>
						</div>
					</div>
				</div>		
				<hr />
			</div>
		</div>
		<?php
			include("/Vues/footer.php");
		?>
	</div>
</body>
</html>