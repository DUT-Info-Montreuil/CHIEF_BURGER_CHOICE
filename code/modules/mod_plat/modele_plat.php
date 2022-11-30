<<<<<<< HEAD
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
	
		$prix = $burger['prix'] + $boisson['prix'];

		$idBurger = $burger['id_burger'];
		$idBoisson = $boisson['id_boisson'];

		

		$idCommande = $this->commande();

		var_dump(array(null,$burger['nom'],15,$idBoisson,$idCommande,$idBurger));

		$sth1 = self::$bdd->prepare('insert into Menu (id_menu,nom,prix,id_boisson,id_commande,id_burger) values (?,?,?,?,?,?)');
		$sth1->execute(array(null,$burger['nom'],$prix,$idBoisson,$idCommande,$idBurger));
        print "Menu commandé";
    } 
	
	public function commande() {
		$requete2 = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE nom = ?");
        $requete2->execute([$_SESSION['log']]);
        $auteur = $requete2->fetch();

		$sth = self::$bdd->prepare('insert into Commande (id_utilisateur) values (?)');
		$sth->execute(array($auteur['id_utilisateur']));

		return self::$bdd->LastInsertId();
	}

	public function liste_plat() {
		$requete = self::$bdd->prepare("SELECT * FROM Menu");
        $requete->execute();
		$row = $requete->fetchAll();

		return $row;		
	}
}
?>
=======
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
	
		$prix = $burger['prix'] + $boisson['prix'];

		$idBurger = $burger['id_burger'];
		$idBoisson = $boisson['id_boisson'];

		

		$idCommande = $this->commande();

		var_dump(array(null,$burger['nom'],15,$idBoisson,$idCommande,$idBurger));

		$sth1 = self::$bdd->prepare('insert into Menu (id_menu,nom,prix,id_boisson,id_commande,id_burger) values (?,?,?,?,?,?)');
		$sth1->execute(array(null,$burger['nom'],$prix,$idBoisson,$idCommande,$idBurger));
        print "Menu commandé";
    } 
	
	public function commande() {
		$requete2 = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE nom = ?");
        $requete2->execute([$_SESSION['log']]);
        $auteur = $requete2->fetch();

		$sth = self::$bdd->prepare('insert into Commande (id_utilisateur) values (?)');
		$sth->execute(array($auteur['id_utilisateur']));

		return self::$bdd->LastInsertId();
	}

	public function liste_plat() {
		$requete = self::$bdd->prepare("SELECT * FROM Menu");
        $requete->execute();
		$row = $requete->fetchAll();

		return $row;		
	}
}
?>
>>>>>>> ffe43ba407183df3f98ba08e376f45bc4a685c35
