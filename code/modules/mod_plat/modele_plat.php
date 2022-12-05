
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

		$requete1->execute("Fanta"/*[$_POST['boisson']]*/);
        $boisson = $requete1->fetch();
	
		$prix = $burger['prix'] + $boisson['prix'];

		$idBurger = $burger['id_burger'];
		$idBoisson = $boisson['id_boisson'];

		

		$idCommande = $this->commande();



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

		// Récupère tous les burgers, toutes catégories confondues.
		$requete = self::$bdd->prepare("SELECT * FROM Burger");
		$requete->execute();
		$burgers = $requete->fetchAll();

		if (isset($_POST['appliquer_filtre'])) {
			$listeCategorie = $this->liste_categorie();
			// Récupère tous les burgers qui correspondent aux filtres selectionnés.
			$burgers = array();
			$compt = 0;
			foreach($listeCategorie as $row) {
				if(isset($_POST[$row['nom']])) {
					$requete = self::$bdd->prepare("SELECT * FROM definitBurger where id_categorie= ?");
					$requete->execute([$row['id_categorie']]);
					$burgerCat = $requete->fetchAll();
					
					foreach ($burgerCat as $row) {	
						$requete = self::$bdd->prepare("SELECT * FROM Burger where id_burger= ?");
						$requete->execute([$row['id_burger']]);
						$burgerCat2 = $requete->fetchAll();
								
						$burgers = array_merge($burgers,$burgerCat2);
					}
					$compt++;
				}
			}
			//Assure que le burger répond à tous les filtres selectionnés.
			foreach($burgers as $row) {
				$nbr = count(array_keys($burgers,$row));
				if ($nbr != $compt) {
					unset($burgers[array_search($row, $burgers)]);
				}
			}
		}
		// Supprime les doublons car un burger peut avoir plusieurs catégories.
		$burgers2 = array();
		foreach ($burgers as $row) {
			if (!in_array($row,$burgers2)) {
				$burgers2 = array_merge($burgers2,array($row));
			}	
		}
		return $burgers2;		
	}

	public function liste_categorie() {
		$requete = self::$bdd->prepare("SELECT * FROM Categorie");
        $requete->execute();
		$row = $requete->fetchAll();

		return $row;		

	} 

	public function affichePlat() {
		echo $_GET['idPlat'];
	}
}
?>
