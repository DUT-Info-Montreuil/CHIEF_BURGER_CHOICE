
<?php

include_once "Connexion.php";

class ModeleConnexion extends Connexion{

	
	public function __construct() {
		self::initConnexion();
	}

	public function ajoutUtilisateur() {
        $login = $_POST['login'];       
        $mail = $_POST['mail'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                
        $sth = self::$bdd->prepare('insert into Utilisateur (id_utilisateur,nom,email,password) values (?,?,?,?)');
        $sth->execute(array(null,$login,$mail,$password));
    }
	
    public function seConnecter() {
        $requete = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE nom = ?");
        $requete->execute([$_POST['login']]);
        $utilisateur = $requete->fetch();

        if ($utilisateur && password_verify($_POST['password'], $utilisateur['password'])) {
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