<?php
session_start();
// $bdd = new PDO('mysql:dbname=dutinfopw201653;host=database-etudiants.iut.univ-paris8.fr', 'dutinfopw201653', 'vyzepuru');
$bdd = new PDO('mysql:host=localhost;dbname=cbc;', 'dutinfopw201653', 'vyzepuru');
if(isset($_POST['inscription'])){
    if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['mdp'])){
        $cle = rand(100000, 300000);
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $inserer_user=$bdd->prepare('INSERT INTO test_mail(nom, email, mdp, cle, confirme) VALUES (?, ?, ?, ?, ?)');
        $inserer_user->execute(array($nom, $email, $mdp, $cle, 0));

        $recup_user=$bdd->prepare('SELECT * FROM test_mail WHERE email=?');
        $recup_user->execute(array($email));
        if($recup_user->rowCount()>0){
            $user_infos = $recup_user->fetch();
            $_SESSION['id'] = $user_infos['id'];

            $dest=$_POST['email'];
            $objet="Bienvenue dans notre restaurant";
            $message='
                http://localhost/CHIEF_BURGER_CHOICE/code/confirmationEmail/verif.php?id='.$_SESSION['id'].'&cle='.$cle;
            $entetes="Content-Type: text/html; charset=iso-8859-1";
            $entetes.="From: chiefburgerchoice@gmail.com";
                
            if(mail($dest,$objet,$message,$entetes))
                echo "Nous avons envoyé un mail à l'adresse que vous avez fourni afin de vérifier que l'adresse email est bien la votre.";
            else
                echo "Un problème est survenu.";
        }
    }else{
        echo "Veillez à bien remplir tous les champs";
    }
}

?>
<!DOCTYPE html>
<html>
<form method="POST" action="">
    <input type="text" name="nom" placeholder="Entrez votre nom" required>
    <input type="email" name="email" placeholder="Entrez votre adresse email" required>
    <input type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
    <input type="submit" name="inscription" placeholder="Inscription" required>
</form>
</html>