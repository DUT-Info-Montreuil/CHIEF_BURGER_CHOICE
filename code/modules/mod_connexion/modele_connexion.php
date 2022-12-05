
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
            $cle = rand(100000, 300000);
                
            $sth = self::$bdd->prepare('INSERT INTO utilisateur (nom, email, mdp, cle, confirme) VALUES (?, ?, ?, ?, ?)');
            $sth->execute(array($login,$mail,$password, $cle, 0));

            $recup_user =self::$bdd->prepare('SELECT * FROM utilisateur WHERE email=?');
            $recup_user->execute(array($mail));
            if($recup_user->rowCount()>0){
                $user_infos = $recup_user->fetch();
                $_SESSION['id'] = $user_infos['id_utilisateur'];

                $dest=$_POST['mail'];
                $a = $_SESSION['id'];
            
                $objet="Bienvenue dans notre restaurant";
                $message="
                Vous venez de vous inscrire chez Chief Burger Choice. \r\n
                Pour confirmer votre inscription veuillez clicker 
                <a href = 'http://localhost/CHIEF_BURGER_CHOICE/code/modules/mod_connexion/verif.php?id=$a&cle=$cle' > ici </a>
                    ";
                $entetes = "MIME-Version: 1.0\r\n";
                $entetes.="Content-Type: text/html; charset=iso-8859-1\r\n";
                $entetes.="From: chiefburgerchoice@gmail.com";
                
                if(mail($dest,$objet,$message,$entetes))
                    echo "Nous avons envoyé un mail à l'adresse que vous avez fourni afin de vérifier qu'il s'agit bien de la votre.";
                else
                    echo "Un problème est survenu.";
            }
        }
	
    public function seConnecter() {
        if(!empty($_POST['login']) && !empty($_POST['password'])){

            $requete = self::$bdd->prepare("SELECT * FROM utilisateur WHERE nom = ?");
            $requete->execute([$_POST['login']]);

            if($requete->rowCount() > 0){
                $utilisateur = $requete->fetch();
                if($utilisateur['confirme'] == 1){
                    if (password_verify($_POST['password'], $utilisateur['mdp'])) {
                        $_SESSION['log'] = $utilisateur['nom'];
                        header('Location: modules/mod_connexion/verif.php?id='.$utilisateur['id_utilisateur'].'&cle='.$utilisateur['cle']);
                    } else {
                        echo "login ou mot de passe incorrect";
                    }
                } else {
                    echo "Vous n'avez pas encore été confirmé. Veuillez le faire afin d'accéder à notre site";
                }
            }
        }
    }
    
    public function seDeconnecter() {
        if (isset($_SESSION['log']))  {
            session_unset();
            session_destroy();
        }        
    }
}
?>