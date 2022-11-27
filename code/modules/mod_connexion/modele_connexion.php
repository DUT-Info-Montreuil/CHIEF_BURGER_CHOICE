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

                $dest=$mail;
                $objet="Bienvenue dans notre restaurant";
                $message="
                    <font face='arial'>
                    Bonjour ".$login." et bienvenue.n
                    Pour valider votre inscription vous devez écrire le code suivant 
                    </font>
                ";
                $entetes="Content-Type: text/html; charset=iso-8859-1";
                $entetes.="From: chiefburgerchoice@gmail.com";
                
                if(mail($dest,$objet,$message,$entetes))
                    echo "Mail envoyé avec succès.";
                else
                    echo "Un problème est survenu.";

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
        $requete = self::$bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
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
