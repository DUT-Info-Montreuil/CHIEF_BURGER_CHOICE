<?php 
session_start();
//$bdd = new PDO('mysql:dbname=dutinfopw201653;host=database-etudiants.iut.univ-paris8.fr', 'dutinfopw201653', 'vyzepuru');
$bdd = new PDO('mysql:host=localhost;dbname=cbc;', 'dutinfopw201653', 'vyzepuru');
if (isset($_POST['Valider'])){
    if(!empty($_POST['email']) AND !empty($_POST['mdp'])){

        $recup_user = $bdd->prepare("SELECT * FROM test_mail WHERE email = ? AND mdp = ?");
        $recup_user->execute(array($_POST['email'], $_POST['mdp']));
        if($recup_user->rowCount() > 0){
            $info_user = $recup_user->fetch();
            if($info_user['confirme'] == 1){
                header('Location: verif.php?id='.$info_user['id'].'&cle='.$info_user['cle']);
            } else {
                echo "Vous n'avez pas encore été confirmé. Veuillez le faire afin d'accéder à notre site";
            }
        } else {
            echo "Le compte n'existe pas";
        }
    }else{
        echo "Tous les champs ne sont pas remplis";
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Connexion </title>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Entrez votre adresse email" required>
        <input type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
        </br>
        <input type="submit" name="Valider">
    </form>
</body>
</html>