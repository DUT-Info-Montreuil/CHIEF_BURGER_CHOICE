<?php
include_once "Connexion.php";

class ModelePlat extends Connexion{
	
	public function __construct() {
		self::initConnexion();
	}

	public function inserer_plat() {           
		$burger = $_POST['burger'];
		$boisson = $_POST['boisson'];  
		
		$nomMenu = $_POST['burger'];
		$prix = prixPlat($burger,$boisson);
		$email = lo;
		$auteur = $_SESSION['log'];
		$id_burger =
		$id_boisson = 

		$sth = self::$bdd->prepare('insert into Commande () values ()');
		$sth->execute();

		$idCommande = self::$bdd->last_InsertId();

		$sth1 = self::$bdd->prepare('insert into Menu (nom,prix,email,auteur,id_burger,id_boisson,id_commande) values (?,?,?,?,?,?,?)');
		$sth1->execute(array($nomMenu,$prix,$email,$auteur,$id_burger,$id_boisson,$idCommande));
        print "Menu commandé";
    }   

	public function prixPlat($burger,$boisson) {
		$prixBurger;
		$prixBoisson;
		$sqlBurger = 'SELECT * FROM Burger';
		$sqlBoisson = 'SELECT * FROM Boisson';
		foreach (self::$bdd ->query($sqlBurger) as $row) {
			if ($row['nom'] == $burger) {
				$prixBurger = $row['prix'];
			}
		}
		foreach (self::$bdd ->query($sqlBoisson) as $row) {
			if ($row['nom'] == $boisson) {
				$prixBoisson = $row['prix'];
			}
		}

		return $prixBurger + $prixBoisson;
	}
}
?>
