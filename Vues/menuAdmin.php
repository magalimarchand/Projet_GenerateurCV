<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="menuAdmin">
	<?php
		if (!ISSET($_SESSION)) session_start();
		if (ISSET($_SESSION['alias'])){
	?>
					
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<p class="navbar-text">Administrer : </p> 
			<ul class="nav navbar-nav navbar-right">					
				<a href="?action=afficherMembres" class="btn btn-success" role="button">Les membres</a>					
			</ul>
		</div>
	</nav>
	<?php
		}
	?>
</div>
			