<?php
/*Version 1.0 - 2022/11/30
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Naoufel,Marwan et Boulaye
Web Site = <http://localhost/CHIEF_BURGER_CHOICE/code/index.html>*/
class Connexion {
	
	protected static $bdd;	

	public function __construct() {

	}

	public static function initConnexion() {
		self::$bdd = new PDO('mysql:dbname=dutinfopw201653;host=database-etudiants.iut.univ-paris8.fr', 'dutinfopw201653', 'vyzepuru');
		//self::$bdd = new PDO('mysql:host=localhost;dbname=cbc;', 'dutinfopw201653', 'vyzepuru');
	}
}

?>
