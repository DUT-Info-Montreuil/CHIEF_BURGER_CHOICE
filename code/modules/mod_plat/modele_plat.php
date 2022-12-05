
<?php

include_once "Connexion.php";

class ModelePlat extends Connexion{
	
	public function __construct() {
		self::initConnexion();
	}

	public function inserer_plat() {           
		$requete = self::$bdd->prepare("SELECT * FROM Burger WHERE id_burger = ?");
        $requete->execute([$_GET['idPlat']]);
        $burger = $requete->fetch();


		$requete1 = self::$bdd->prepare("SELECT * FROM Boisson WHERE nom = ?");
        $requete1->execute([$_POST['boisson']]);
        $boisson = $requete1->fetch();
	
		$prix = $burger['prix'] + $boisson['prix'];

		$idBurger = $burger['id_burger'];
		$idBoisson = $boisson['id_boisson'];

		
		$idCommande = $this->commande();



		$sth1 = self::$bdd->prepare('INSERT INTO Menu (id_menu,nom,prix,id_boisson,id_commande,id_burger) values (?,?,?,?,?,?)');
		$sth1->execute(array(null,$burger['nom'],$prix,$idBoisson,$idCommande,$idBurger));
        print "Menu commandé";
    } 
	
	public function commande() {
		$requete2 = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE nom = ?");
        $requete2->execute([$_SESSION['log']]);
        $auteur = $requete2->fetch();

		$sth = self::$bdd->prepare('INSERT INTO Commande (id_utilisateur) values (?)');
		$sth->execute(array($auteur['id_utilisateur']));

		return self::$bdd->LastInsertId();
	}

	public function liste_plat() {
		$requete = self::$bdd->prepare("SELECT * FROM Burger");
        $requete->execute();
		$row = $requete->fetchAll();

		return $row;		
	}


	public function liste_ingredients_d_un_burger($ingrdient_recherche){
		$requete = self::$bdd->prepare("SELECT Ingredient.nom FROM Ingredient INNER JOIN compose ON Ingredient.id_ingredient=compose.id_ingredient 
										INNER JOIN Burger ON compose.id_burger = Burger.id_burger WHERE Burger.id_burger = '$ingrdient_recherche'");
        $requete->execute();
		$row = $requete->fetchAll();
		return $row;

	}

	public function liste_boissons(){

		$requete = self::$bdd->prepare("SELECT * FROM Boisson");
        $requete->execute();
		$row = $requete->fetchAll();

		return $row;	
	}


	

}
?>
