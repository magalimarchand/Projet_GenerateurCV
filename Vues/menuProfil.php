<div id="menuProfil">
	<ul>
	<?php
		if (!ISSET($_SESSION)) session_start();
		if (ISSET($_SESSION['alias'])){
	?>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<p class="navbar-text">Éditer les sections : </p> 
				<ul class="nav navbar-nav">
					<li><a href="?action=afficherInfos">Infos Personnelles</a></li>
					<li><a href="?action=afficherExpPro">Experiences Pro</a></li>
					<li><a href="?action=afficherFormations">Formations</a></li>
					<li><a href="?action=afficherCompetences">Competences</a></li>
					<li><a href="?action=afficherObjectifs">Objectifs</a></li>
					<li><a href="?action=afficherSection">Autres sections</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<a href="?action=afficherResume" class="btn btn-danger" role="button">Profil Global</a>
				</ul>
			</div>			
		</nav>
	<?php
		}
	?>
	</ul>
</div>
			