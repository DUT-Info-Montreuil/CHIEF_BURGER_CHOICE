<?php
    require_once'Connexion.php';
    
    class ModeleClient extends Connexion{

        public function __construct() {
        }



        /* 
        insertion (création) du nouveau burger dans Burger

        insertion de l'id du dernier burger créé (à récupérer avec lastinsertid) dans table de liaison
        insertion des id ingredients dans table de liaison

        */

        public function liker(){


            /*
            $SESSION['log'];
            */

            //insertion de l'id_client de la session en cours dans table_like
            $sql1= Connexion::$bdd->prepare('SELECT id_utilisateur FROM Utilisateur WHERE nom = ?');
            $sql1->execute(array($_SESSION['log']));
            $verifSQL1=$sql1->fetch();
            
            //recup de l'id du burger cliqué + le stocker dans table_like
            
         
            }


            

    }
?>