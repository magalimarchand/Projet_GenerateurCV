<?php
require_once('./Controleur/Action.php');
class DefaultAction implements Action {
	public function execute(){
		// afficher la page d'accueil (vue default)
		return "default";
	}
}
?>