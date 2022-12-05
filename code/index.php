<?php
/*Version 1.0 - 2022/11/30
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Naoufel,Marwan et Boulaye
Web Site = <http://localhost/CHIEF_BURGER_CHOICE/code/index.html>*/
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
		
require_once "template.php";
?>
	

	
