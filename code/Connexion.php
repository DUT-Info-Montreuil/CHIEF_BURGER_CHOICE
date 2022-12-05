<?php

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
