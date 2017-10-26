<?php
require_once('./Controleur/ActionBuilder.php');
require_once('./controleur/RequirePRGAction.php');

$action = NULL;
$vue = NULL;

if (ISSET($_REQUEST["action"])){
		$action = ActionBuilder::getAction($_REQUEST["action"]);
		$vue = $action->execute();
	}
else {
		$action = ActionBuilder::getAction("");
		$vue = $action->execute();
	}
if ($action instanceof RequirePRGAction) {

	header("Location: ?action=".$vue);
}
else {
	include_once('vues/'.$vue.'.php');
}
?>