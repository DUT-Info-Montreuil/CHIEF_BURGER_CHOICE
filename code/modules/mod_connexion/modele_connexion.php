<?php

include_once "Connexion.php";

class ModeleConnexion extends Connexion{

	
	public function __construct() {
		self::initConnexion();
	}

	public function ajoutUtilisateur() {
        $sql = 'SELECT * FROM tableUtilisateurs';	
		$num = 0;
		foreach (self::$bdd ->query($sql) as $row) {
			$num++;
		}	
		
        if ($_POST['login'] != null && $_POST['password'] != null && $_POST['mail'] != null) {
            if ($_POST['password'] == $_POST['confirmPassword']) {
                $login = $_POST['login'];       
                $id = $num+1;
                $mail = $_POST['mail'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $confirmPassword = password_hash($_POST['confirmPassword'], PASSWORD_DEFAULT);

                $sth = self::$bdd->prepare('insert into tableUtilisateurs (idConnexion, login, mail, mdp) values (?,?,?,?)');
                $sth->execute(array($id,$login,$mail,$password));
                print "inscrit!!!";
            } else {
                print "les mots de passe ne sont pas identiques";
            }
        } else {
            print "Veuillez remplir tous les champs";
        }    
    }
	
    public function seConnecter() {
        $requete = self::$bdd->prepare("SELECT * FROM tableUtilisateurs WHERE login = ?");
        $requete->execute([$_POST['login']]);
        $utilisateur = $requete->fetch();

        if ($utilisateur && password_verify($_POST['password'], $utilisateur['password'])) {
            $_SESSION['log'] = $utilisateur['login'];
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
