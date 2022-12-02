<?php
    require_once'Connexion.php';
    
    class ModeleBurger extends Connexion{

        public function __construct() {
        }


        public function calculerPrixBurger(){

            
            $somme_prix_ingr = Connexion::$bdd->prepare('SELECT SUM(prix_ingredient) from Burger join table_liaison using(id_burger) join Ingredient using(id_ingredient) WHERE nom_burger = :nomBurger');
            $somme_prix_ingr->execute(array(':nomBurger' => $_POST['nom_de_mon_burger']));

        }

        /* 
        insertion (création) du nouveau burger dans Burger

        insertion de l'id du dernier burger créé (à récupérer avec lastinsertid) dans table de liaison
        insertion des id ingredients dans table de liaison

        */

        public function creerBurger(){


            //insertion(création) du nouveau burger dans Burger
            $sql4 = Connexion::$bdd->prepare('INSERT INTO Burger VALUES(NULL, :nom, :prix)');
            $sql4->execute(array(':nom' => $_POST['nom_de_mon_burger'], ':prix' => $this->calculerPrixBurger()));

            //insertion de l'id_burger dans table de liaison avec lastinsertid
            $dernier_ID = intval(self::$bdd->LastInsertId());
            
            //recup id de l'ingredient cliqué, les stocker ds array
            $choix_ingredients = $_POST['ingredient'];
            foreach ($choix_ingredients as $ingredient){ 
                
                $sql1= Connexion::$bdd->prepare('SELECT id_ingredient FROM Ingredient WHERE nom_ingredient = ?');
                $sql1->execute(array($ingredient));
                $verifSQL1=$sql1->fetch();
                
                $idIngr = $sql1;
                
                //var_dump($verifSQL1);
                $sql3 = Connexion::$bdd->prepare('INSERT INTO table_liaison VALUES ( ?, ?)');
                $sql3->execute(array($dernier_ID,$verifSQL1['id_ingredient']));
                                $sql1->execute(array($ingredient));
                
            }
         
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