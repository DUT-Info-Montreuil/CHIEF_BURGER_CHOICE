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
	case "mod_burger":
		include_once ("modules/".$module."/".$module.".php");
		$mod = new ModBurger;
		break;

				
		default:
			die();
}
$mod->exec();

require_once "Composants/compMenu/comp_menu.php";
$menu = new CompMenu();
		
require_once "template.php";	
?>
	

	


