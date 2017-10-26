 <!DOCTYPE html>

 <html>
 <head>
	<title>Pro CV - Profil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./CSS/MonStyle01.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
	
	<script src="./js/script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body id="top" onselectstart="return false" 
		oncontextmenu="return false" ondragstart="return false" 
		onMouseOver="window.status='Il est strictement interdit de copier les images sur ce site'; 
		return true;">   <!-- Empêcher le vol d'images sur la page -->
	<div>
	<?php
		include("/Vues/banniere.php");		
	?>
	
	<div class="container">
		<form action="" method="post">
			<div class="row">
				<div class="col-xs-offset-3 col-xs-8">
					<h3 id="txProfil">Modèles de CV</h3>						
				</div>				
				<div class="col-xs-1">
					<a href="?action=deconnecter">Deconnexion</a>
				</div>			
			</div>
		</form>
		<hr />
		

		<?php
		include("/menuProfil.php");			
		require_once("./Modele/MembreDAO.php");	
		require_once("./Modele/Classes/Membre.php");	
				
		$alias = $_SESSION["alias"];		
		$daoM = new MembreDAO();
		$memb = $daoM->find($alias);
		$_SESSION["noMembre"] = $memb->getIdMembre();
		$id = $_SESSION["noMembre"]; 
		?>	
		<?php
		require_once("./Modele/VoteDAO.php");	
		require_once("./Modele/Classes/Vote.php");
		require_once("./Modele/Classes/listeVotes.php");
		$daoV = new VoteDAO();
		$listeV = $daoV->findAll($id); //Récupération de tous les votes du membre
		?>
									
	<!-- Nav tabs -->
		<div>
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#competences" aria-controls="competences" role="tab" data-toggle="tab">Compétences</a></li>
				<li role="presentation"><a href="#chronologique" aria-controls="chronologique" role="tab" data-toggle="tab">Chronologique</a></li>
			</ul>
	<!-- Tab panes -->
		<div class="tab-content">
	<!-- debut tab competences -->
			<div role="tabpanel" class="tab-pane active" id="competences">
				<div class="container">
				<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<div id="carousel-cv" class="carousel slide" data-ride="carousel" data-interval="0">
	<!-- SLIDES -->
	
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img class="modele" src="./ExemplesCV/compT01.jpg" alt="competence1">		
							<div class="carousel-caption">
								<div class="vote">
									<form action="" method="post">
									<h6> MODÈLE 2 &nbsp &nbsp &nbsp <span>
									<?php
									$listeAllV = $daoV->findAllVotes(2); //Récupération de tous les votes de la BD selon le modèle
									$up = 0; //Initialisation des votes
									$down = 0; 
									while ($listeAllV->next()){
										$votes = $listeAllV->getCurrent();
										if(($votes != NULL) ){
											$s = $votes->getStatut(); //Récupération des votes totaux
											if(($s) == 0){ $up += 1; }
											else if(($s) == 1){ $down += 1; }
									}} ?>
										<button class="fa fa-thumbs-o-up btn2" type="submit" name="up"></button><span> &nbsp </span>
										<button class="fa fa-thumbs-o-down btn2" type="submit" name="down"></button>
										<input name="action" value="enregistrerVote" type="hidden" />
										<input name="modele" value="2" type="hidden" />
										<h5 id="votes2"><?php echo $up ?><span> &nbsp &nbsp &nbsp &nbsp </span><?php echo $down ?></h5></span></h6>
									</form>
									<?php
									$listeAllV = $daoV->findAllVotes(2); //Récupération de tous les votes de la BD selon le modèle
									while ($listeAllV->next()){
										$votes = $listeAllV->getCurrent();
										if(($votes != NULL) ){
											if($votes->getNoMembre() == $id){ //Désactivation de vote si déjà voté
											?> <script>  disableBtnVote('.btn2');</script> <?php
									} } } ?>
								</div>
							</div>
						</div>
						<div class="item">
							<img class="modele" src="./ExemplesCV/compT02.jpg" alt="competence2">		
							<div class="carousel-caption">
								<div class="vote">
									<form action="" method="post">
									<h6> MODÈLE 3 &nbsp &nbsp &nbsp <span>
									<?php
									$listeAllV = $daoV->findAllVotes(3); //Récupération de tous les votes de la BD selon le modèle
									$up = 0; //Initialisation des votes
									$down = 0;
									while ($listeAllV->next()){
										$votes = $listeAllV->getCurrent();
										
										if(($votes != NULL) ){
											$s = $votes->getStatut();
											if(($s) == 0){ $up += 1; }
											else if(($s) == 1){ $down += 1; }
										}
									} 
									?>
										<button class="fa fa-thumbs-o-up btn3" type="submit" name="up"></button><span> &nbsp </span>
										<button class="fa fa-thumbs-o-down btn3" type="submit" name="down"></button>
										<input name="action" value="enregistrerVote" type="hidden" />
										<input name="modele" value="3" type="hidden" />
										<h5 id="votes2"><?php echo $up ?><span> &nbsp &nbsp &nbsp &nbsp </span><?php echo $down ?></h5></span></h6>
									</form>
									<?php
									$listeAllV = $daoV->findAllVotes(3); //Récupération de tous les votes de la BD selon le modèle
									while ($listeAllV->next()){
										$votes = $listeAllV->getCurrent();
										if(($votes != NULL) ){
											if($votes->getNoMembre() == $id){ //Désactivation de vote si déjà voté
											?> <script>  disableBtnVote('.btn3');</script> <?php
									} } } ?>
								</div>
							</div>
						</div>
					</div>
	<!-- CONTROLS -->
					<a class="left carousel-control" href="#carousel-cv" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-cv" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				</div>
				</div>
				</div>
			</div><!-- Fin tab ccompetences -->
	<!-- debut tab chronologique -->
			<div role="tabpanel" class="tab-pane" id="chronologique">
				<div class="container">
				<div class="row">
				<div class="col-md-8 col-md-offset-2">
				<div id="carousel-cv" class="carousel slide" data-ride="carousel" data-interval="0">
	<!-- SLIDES -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img class="modele" src="./ExemplesCV/chronoT01.jpg" alt="chrono1">		
							<div class="carousel-caption">
								<div class="vote">
									<form action="" method="post">
									<h6> MODÈLE 1 &nbsp &nbsp &nbsp <span>
									<?php
									$listeAllV = $daoV->findAllVotes(1); //Récupération de tous les votes de la BD selon le modèle
									$up = 0; //Initialisation des votes
									$down = 0; 
									while ($listeAllV->next()){
										$votes = $listeAllV->getCurrent();
										
										if(($votes != NULL) ){
											$s = $votes->getStatut();
											if(($s) == 0){ $up += 1; }
											else if(($s) == 1){ $down += 1; }
										}
									} 
									?>
										<button class="fa fa-thumbs-o-up btn1" type="submit" name="up"></button><span> &nbsp </span>
										<button class="fa fa-thumbs-o-down btn1" type="submit" name="down"></button>
										<input name="action" value="enregistrerVote" type="hidden" />
										<input name="modele" value="1" type="hidden" />
										<h5 id="votes2"><?php echo $up ?><span> &nbsp &nbsp &nbsp &nbsp </span><?php echo $down ?></h5></span></h6>
									</form>
									<?php
									$listeAllV = $daoV->findAllVotes(1); //Récupération de tous les votes de la BD selon le modèle
									while ($listeAllV->next()){
										$votes = $listeAllV->getCurrent();
										if(($votes != NULL) ){
											if($votes->getNoMembre() == $id){ //Désactivation de vote si déjà voté
											?> <script>  disableBtnVote('.btn1');</script> <?php
									} } } ?>
								</div>
							</div>
						</div>
					</div>
	<!-- CONTROLS -->
					<a class="left carousel-control" href="#carousel-cv" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-cv" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				</div>
				</div>
				</div>
			</div><!-- Fin tab chronologique -->
		</div>
		</div>	
		
		
		<div class="row"><hr /></div>
		<br />
	</div>
	<?php
		include("/footer.php");
	?>
	</div>	
	
	
 </body>
 </html>	
 				
				
				
