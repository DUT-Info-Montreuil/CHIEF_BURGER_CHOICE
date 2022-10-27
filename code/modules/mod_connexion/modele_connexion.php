<?php
include_once "/home/etudiants/info/bseydi/local_html/MVC3/modules/Connexion.php";

class ModeleConnexion extends Connexion{
	
	public function __construct() {
		self::initConnexion();
	}

	public function ajoutUtilisateur() {
        $sql = 'SELECT * FROM utilisateurs';	
		$num = 0;
		foreach (self::$bdd ->query($sql) as $row) {
			$num++;
		}	
         
        $id = $num+1;
		$login = $_POST['login'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$sth = self::$bdd->prepare('insert into utilisateurs (id, login, password) values (?,?,?)');
		$sth->execute(array($id,$login,$password));
        print "inscrit!!!";
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
