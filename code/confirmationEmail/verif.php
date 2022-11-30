<?php
session_start();
//$bdd = new PDO('mysql:dbname=dutinfopw201653;host=database-etudiants.iut.univ-paris8.fr', 'dutinfopw201653', 'vyzepuru');
$bdd = new PDO('mysql:host=localhost;dbname=cbc;', 'root', 'root');

if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['cle']) AND !empty($_GET['cle'])){

    $getid = $_GET['id'];
    $getcle = $_GET['cle'];
    $recup_user = $bdd->prepare('SELECT * FROM test_mail where id = ? AND cle = ?');
    $recup_user->execute(array($getid, $getcle));
    if ($recup_user->rowCount()>0){
        $user_info = $recup_user->fetch();
        if ($user_info['confirme'] != 1){
            $update_confirme = $bdd->prepare('UPDATE test_mail SET confirme = ? WHERE id = ?');
            $update_confirme->execute(array(1, $getid));
        } else {
            $_SESSION['cle'] = $getcle;
            //header('Location: index.php');
        }
    } else {
        echo'Votre clé est incorrecte';
    }
} else {
    echo 'Aucun utilisateur trouvé';
}
?>