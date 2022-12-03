<?php
session_start();

$module = isset($_GET['module']) ? $_GET['module'] : 'mod_connexion';
switch($module) {
	case "mod_connexion":
		include_once ("modules/".$module."/".$module.".php");
		$mod = new ModConnexion;
		break;
				
		default:
			die();
}


$mod->exec();
		
require_once "template.php";
?>