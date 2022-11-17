<?php
include_once "Connexion.php";

class ModelePlat extends Connexion{
	
	public function __construct() {
		self::initConnexion();
	}

	public function inserer_plat() {           
		$requete = self::$bdd->prepare("SELECT * FROM Burger WHERE nom = ?");
        $requete->execute([$_POST['burger']]);
        $burger = $requete->fetch();


		$requete1 = self::$bdd->prepare("SELECT * FROM Boisson WHERE nom = ?");
        $requete1->execute([$_POST['boisson']]);
        $boisson = $requete1->fetch();

		
		$requete2 = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE nom = ?");
        $requete2->execute([$_SESSION['log']]);
        $auteur = $requete2->fetch();
	
		$prix = $burger['prix'] + $boisson['prix'];

		$idBurger = intval($burger['id_burger']);
		$idBoisson = intval($boisson['id_boisson']);

		

		$idCommande = $this->commande();

		var_dump(array(null,$burger['nom'],15,$auteur['email'],$auteur['nom'],$idBurger,$idBoisson,$idCommande));

		$sth1 = self::$bdd->prepare('insert into Menu (id_menu,nom,prix,email,auteur,id_burger,id_boisson,id_commande) values (?,?,?,?,?,?,?,?)');
		$sth1->execute(array(null,$burger['nom'],15,$auteur['email'],$auteur['nom'],$idBurger,$idBoisson,$idCommande));
        print "Menu commandé";
    } 
	
	public function commande() {
		$sth = self::$bdd->prepare('insert into Commande () values ()');
		$sth->execute();

		return intval(self::$bdd->LastInsertId());
	}
}
?>
