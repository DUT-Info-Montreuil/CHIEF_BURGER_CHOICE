<?php
session_start();

$module = isset($_GET['module']) ? $_GET['module'] : 'mod_connexion';
switch($module) {
	case "mod_connexion":
		include_once ("modules/".$module."/".$module.".php");
		$mod = new ModConnexion;
		break;
	case "mod_plat":
		include_once ("modules/".$module."/".$module.".php");
		$mod = new ModPlat;
		break;
				
		default:
			die();
}

include_once "Composants/compMenu/comp_menu.php";
$menu = new compMenu();

$mod->exec();
		
require_once "template.php";
?>
	

	


