<?php

include_once "Connexion.php";

class ModeleConnexion extends Connexion{

	
	public function __construct() {
		self::initConnexion();
	}

	public function ajoutUtilisateur() {

        if ($_POST['login'] != null && $_POST['password'] != null && $_POST['mail'] != null) {
            if ($_POST['password'] == $_POST['confirmPassword']) {
                $login = $_POST['login'];       
                $mail = $_POST['mail'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sth = self::$bdd->prepare('insert into Utilisateur (id_user,nom,email,mdp,id_role) values (?,?,?,?,?)');
                $sth->execute(array(null,$login,$mail,$password,1));
                print "inscrit!!!";

            } else {
                print "les mots de passe ne sont pas identiques";
            }
        } else {
            print "Veuillez remplir tous les champs";
        }

		$idCommande = self::$bdd->LastInsertId();
        print $idCommande;
    }
	
    public function seConnecter() {
        $requete = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE nom = ?");
        $requete->execute([$_POST['login']]);
        $utilisateur = $requete->fetch();

        if ($utilisateur && password_verify($_POST['password'], $utilisateur['mdp'])) {
            $_SESSION['log'] = $utilisateur['nom'];
            echo "connexion";
        } else {
            echo "login ou mot de passe incorrect";
        }
    }
    
    public function seDeconnecter() {
        echo "déconnexion";
        if (isset($_SESSION['log']))  {
            session_unset();
            session_destroy();
        }        
    }
}
?>
