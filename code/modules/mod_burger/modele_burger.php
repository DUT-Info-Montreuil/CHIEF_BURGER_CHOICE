<?php
/*Version 1.0 - 2022/11/30
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Naoufel,Marwan et Boulaye
Web Site = <http://localhost/CHIEF_BURGER_CHOICE/code/index.html>*/
    include_once "Connexion.php";
    
    class ModeleBurger extends Connexion{

        public function __construct() {
            self::initConnexion();
        }
        /* 
        insertion (création) du nouveau burger dans Burger

        insertion de l'id du dernier burger créé (à récupérer avec lastinsertid) dans table de liaison
        insertion des id ingredients dans table de liaison

        */
        public function creerBurger() {
            $requete = self::$bdd->prepare("SELECT id_utilisateur FROM Utilisateur WHERE nom = ?");
            $requete->execute([$_SESSION['log']]);
            $utilisateur = $requete->fetch();
            $prix = $this->calculerPrixBurger();

            $sth = self::$bdd->prepare('insert into Burger (nom,prix,id_utilisateur) values (?,?,?)');
            $sth->execute(array($_POST['nomBurger'],$prix,$utilisateur['id_utilisateur']));

            $dernier_ID = self::$bdd->LastInsertId();
            $listeIngredient = $this->liste_ingredients();
            foreach($listeIngredient as $row) {
                if(isset($_POST[$row['id_ingredient']])) {
                    $sth = self::$bdd->prepare('insert into compose (id_burger,id_ingredient) values (?,?)');
                    $sth->execute(array($dernier_ID,$row['id_ingredient']));
                }
            }
        }

        public function calculerPrixBurger(){
            $totalPrix = null;
            $listeIngredient = $this->liste_ingredients();
            foreach($listeIngredient as $row) {
                if(isset($_POST[$row['id_ingredient']])) {
                    $totalPrix = $totalPrix + $row['prix'];
                }
            }
            return $totalPrix;
        }

        public function liste_ingredients() {
            $requete = self::$bdd->prepare("SELECT * FROM Ingredient");
            $requete->execute();
		    $row = $requete->fetchAll();

		    return $row;
        }


            public function liker_burger(){

                //like disponible sur la page du burger
                
                //recup de l'id du client qui like
                $id_like = $_SESSION['log'];
                $sql_recup_id = Connexion::$bdd->prepare('SELECT * FROM Utilisateurs WHERE nom = ?');
                $sql_recup_id->execute(array($id_like));

                //recup de l'id du burger cliqué
                $id_burger_cliqué = $_GET['idPlat'];
                $sql_recup_id_burger = Connexion::$bdd->prepare('SELECT * FROM Burger WHERE id = ?');
                $sql_recup_id_burger->execute(array($id_burger_cliqué));

                //verif si le client a liké ce burger : SI OUI -> supprimer ce like dans la table dislike + ajout dans la table j_aime --- SI NON -> ajout dans la table j_aime
                $verif_like_dislike = Connexion::$bdd->prepare('SELECT id_utilisateur, id_burger FROM dislike WHERE id_utilisateur = ? AND id_burger = ?');
                $verif_like_dislike->execute(array($id_like,$id_burger_cliqué));
                $dislike = count($verif_like_dislike->fetchAll());

                if ($dislike != 0) {

                    $supp_dislike = Connexion::$bdd->prepare('DELETE FROM dislike WHERE id_utilisateur = ? AND id_burger = ?');
                    $supp_dislike->execute(array($id_like,$id_burger_cliqué));
                }
                
                    //insertions du like dans la table_like
                    $insertion_like = Connexion::$bdd->prepare('INSERT INTO dislike VALUES ( ?, ?)');
                    $insertion_like->execute(array($sql_recup_id,$sql_recup_id_burger));
                
            }


            public function dislike(){

                //dislike disponible sur la page du burger

                //recup de l'id du client dislike
                $id_like = $_SESSION['log'];
                $sql_recup_id = Connexion::$bdd->prepare('SELECT * FROM Utilisateurs WHERE nom = ?');
                $sql_recup_id->execute(array($id_like));

                //recup de l'id du burger cliqué
                $id_burger_cliqué = $_GET['idPlat'];
                $sql_recup_id_burger = Connexion::$bdd->prepare('SELECT * FROM Burger WHERE id = ?');
                $sql_recup_id_burger->execute(array($id_burger_cliqué));


                //verif si le client a liké ce burger : SI OUI -> supprimer ce like dans la table j_aime + ajout dans la table dislike --- SI NON -> ajout dans la table dislike
                $verif_like_dislike = Connexion::$bdd->prepare('SELECT id_utilisateur, id_burger FROM j_aime WHERE id_utilisateur = ? AND id_burger = ?');
                $verif_like_dislike->execute(array($id_like,$id_burger_cliqué));
                $like = count($verif_like_dislike->fetchAll());
                if ($like != 0) {

                    $supp_like = Connexion::$bdd->prepare('DELETE FROM j_aime WHERE id_utilisateur = ? AND id_burger = ?');
                    $supp_like->execute(array($id_like,$id_burger_cliqué));
                    
                }
                    //insertions du like dans la table_like
                    $insertion_like = Connexion::$bdd->prepare('INSERT INTO dislike VALUES ( ?, ?)');
                    $insertion_like->execute(array($sql_recup_id,$sql_recup_id_burger));
                

                
 

            }


            

    }
?>