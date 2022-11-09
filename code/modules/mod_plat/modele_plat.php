<?php

include_once "connexion.php";

class ModelePlat extends Connexion{
	
	public function __construct() {
		self::initConnexion();
	}

	public function inserer_plat() {
            
		/*$sql = 'SELECT * FROM Menu';	
		$num = 0;
		foreach (self::$bdd ->query($sql) as $row) {
			$num++;

		}	  
		
        $id_menu = $num+1;
		$nomMenu = $_POST['burger'];
		$burger = $_POST['burger'];
		$boisson = $_POST['boisson'];

		$sth = self::$bdd->prepare('insert into Menu (id_menu,nom_menu,burger,boisson) values (?,?,?,?)');

		}
		$sqlburger = 'SELECT * FROM Burger';
		$sqlboisson = 'SELECT * FROM Boisson';


		foreach (self::$bdd ->query($sqlburger) as $row) {
			if ($row['nom'] == $_POST['burger']) {
				$prix = $row['prix'];
				$id_burger = $row['id_burger'];
			}
		}
		foreach (self::$bdd ->query($sqlburger) as $row) {
			if ($row['boisson'] == $_POST['boisson']) {
				$id_boisson = $row['id_boisson'];
			}
		}
		
		$mssmmz = 'SELECT prix FROM Burger where nom = '. $_POST['burger'];

        $id_menu = $num+1;
		$nom = "Menu ".$_POST['burger'];

		$email;
		$auteur;
		
		$id_boisson = $_POST['boisson'];
		$id_commande = $_POST['burger'];
		

		$sth = self::$bdd->prepare('insert into Menu (id_menu,nom,prix,email,auteur,id_burger,id_boisson,id_commande) values (?,?,?,?,?,?,?,?)');

		$sth->execute(array($id_menu,$nomMenu,$burger,$boisson));
        print "Menu commandé";*/
    }   
}

?>
