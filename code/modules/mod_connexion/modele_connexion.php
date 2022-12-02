<?php
include_once "Connexion.php";

class ModeleConnexion extends Connexion{

	public function __construct() {
		self::initConnexion();
	}
	public function ajoutUtilisateur() {

        if(!empty($_POST['login']) && !empty($_POST['mail']) && !empty($_POST['password'])){

            if ($_POST['password'] == $_POST['confirmPassword']) {
                $login = $_POST['login'];       
                $mail = $_POST['mail'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $cle = rand(100000, 300000);
                
                $sth = self::$bdd->prepare('insert into Utilisateur (id_utilisateur,nom,email,password, cle, confirme) values (?,?,?,?,?,?)');
                $sth->execute(array(null,$login,$mail,$password, $cle, 0));

                $recup_user=$bdd->prepare('SELECT * FROM Utilisateur WHERE email=?');
                $recup_user->execute(array($mail));
                if($recup_user->rowCount()>0){
                    $user_infos = $recup_user->fetch();
                    $_SESSION['id'] = $user_infos['id'];

                    $dest=$_POST['mail'];
                    $objet="Bienvenue dans notre restaurant";
                    $message='
                        http://localhost/CHIEF_BURGER_CHOICE/code/modules/mod_connexion/verif.php?id='.$_SESSION['log'].'&cle='.$cle;
                    $entetes="Content-Type: text/html; charset=iso-8859-1";
                    $entetes.="From: chiefburgerchoice@gmail.com";
                
                    if(mail($dest,$objet,$message,$entetes))
                        echo "Nous avons envoyé un mail à l'adresse que vous avez fourni afin de vérifier que l'adresse email est bien la votre.";
                    else
                        echo "Un problème est survenu.";
                }

            } else {
                print "les mots de passe ne sont pas identiques";
            }
        } else {
            print "Veuillez remplir tous les champs";
        }
        print "inscrit";
    }
	
    public function seConnecter() {
        if(!empty($_POST['login']) && !empty($_POST['password'])){

            $requete = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE nom = ?");
            $requete->execute([$_POST['login']]);

            if($requete->rowCount() > 0){
                $utilisateur = $requete->fetch();
                if($utilisateur['confirme'] == 1){
                    if (password_verify($_POST['password'], $utilisateur['password'])) {
                        $_SESSION['log'] = $utilisateur['nom'];
                        echo "connexion";
                    } else {
                        echo "login ou mot de passe incorrect";
                    }
                    header('Location: verif.php?id='.$info_user['id'].'&cle='.$info_user['cle']);
                } else {
                    echo "Vous n'avez pas encore été confirmé. Veuillez le faire afin d'accéder à notre site";
                }
            }
        }
    }
    
    public function seDeconnecter() {
        echo "déconnexion";
        if (isset($_SESSION['log']))  {
            session_unset();
            session_destroy();
            header('Location: ../../index.php');
        }        
    }
}
?>