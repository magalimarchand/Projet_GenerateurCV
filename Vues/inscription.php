 <!DOCTYPE html>
 <html>
 <head>
	<title>Pro CV - Inscription</title>
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
			<form action="index.php" method="post">  
				<div class="row">
					<div class="col-xs-offset-3 col-xs-8">
						<h3 id="txProfil">Inscrivez-vous et devenez membre</h3>
					</div>				
					<div class="col-xs-1">
						<br />
						<input type="submit" value="Retour à Accueil" />
					</div>	
				</div>
			</form>
			<hr />		
			<div class="col-xs-offset-3 col-xs-7 formPwRecover">
				<p id="sujet">Informations sur le compte<span id="chOb">&nbsp &nbsp(tous les champs sont obligatoires)</span></p>
				<div class="row"><br /></div> 
				<?php
					if (ISSET($_REQUEST["global_message"]))
						$msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
					$u = "";
					$m2 = "";
					$m3 = "";
					$e = "";
					if (ISSET($_REQUEST["username2"]))
						$u = $_REQUEST["username2"];
					if (ISSET($_REQUEST["mdp2"]))
						$m2 = $_REQUEST["mdp2"];
					if (ISSET($_REQUEST["mdp3"]))
						$m3 = $_REQUEST["mdp3"];
					if (ISSET($_REQUEST["email"]))
						$e = $_REQUEST["email"];
		
				?>
				<form action=" " method="post">
					<div class="row">
						<div class="col-xs-4">
							<p>Nom d'utilisateur :</p>
						</div>	
						<div class="col-xs-6">
							<input class="textBox1" type="text" name="username2"  value="<?php echo $u ?>" />
							<br />
							<?php
								if (ISSET($_REQUEST["field_messages"]["username2"]))
									echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["username2"]."</span>";
							?>
						</div>
					</div>
					<div class="row"><br /></div>  
					<div class="row">
						<div class="col-xs-4">
							<p>Mot de passe :</p>
						</div>
						<div class="col-xs-6">
							<input class="textBox1" type="password" name="mdp2"  value="<?php echo $m2?>" />
							<br />
							<?php
								if (ISSET($_REQUEST["field_messages"]["mdp2"]))
									echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["mdp2"]."</span>";
							?>
						</div>
					</div>
					<div class="row"><br /></div>  
					<div class="row">
						<div class="col-xs-4">
							<p>Confirmer le mot de passe :</p>
						</div>
						<div class="col-xs-6">
							<input class="textBox1" type="password" name="mdp3"  value="<?php echo $m3?>" />
						</div>
					</div>	
					<div class="row"><br /></div>  
					<div class="row">
						<div class="col-xs-4">
							<p>Courriel :</p>
						</div>
						<div class="col-xs-6">						
							<input class="textBox1" type="text" name="email"  value="<?php echo $e?>" />
							<br />
							<?php
								if (ISSET($_REQUEST["field_messages"]["email"]))
									echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["email"]."</span>";
							?>
						</div>
					</div>
					<div class="row"><br /></div>  
					<div class="row">
						<div class="col-xs-offset-5 col-xs-3">
							<input name="action" value="inscrire" type="hidden" />
							<input type="submit" value="Je m'inscris !" />
						</div>
					</div>
				</form>	
				<br />
				<hr />
			</div>
		</div>
		<?php
			include("/Vues/footer.php");
		?>
	</div>
 </body>
 </html>