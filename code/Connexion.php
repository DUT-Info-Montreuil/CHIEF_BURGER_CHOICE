<?php

class Connexion {
	
	protected static $bdd;	

	public function __construct() {

	}

	public static function initConnexion() {
		$dsn = 'mysql:dbname=dutinfopw201653;host=database-etudiants.iut.univ-paris8.fr';
		$user = 'dutinfopw201653';
		$password = 'vyzepuru';	

		self::$bdd = new PDO($dsn, $user, $password);
	}
}

?>
