<?php
session_start();
$bdd = new PDO('mysql:dbname=dutinfopw201653;host=database-etudiants.iut.univ-paris8.fr', 'dutinfopw201653', 'vyzepuru');
//$bdd = new PDO('mysql:host=localhost;dbname=cbc;', 'dutinfopw201653', 'vyzepuru');

if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['cle']) AND !empty($_GET['cle'])){

    $getid = $_GET['id'];
    $getcle = $_GET['cle'];
    $recup_user = $bdd->prepare('SELECT * FROM Utilisateur where id_utilisateur = ? AND cle = ?');
    $recup_user->execute(array($getid, $getcle));
    if ($recup_user->rowCount()>0){
        $user_info = $recup_user->fetch();
        if ($user_info['confirme'] != 1){
            $update_confirme = $bdd->prepare('UPDATE Utilisateur SET confirme = ? WHERE id_utilisateur = ?');
            $update_confirme->execute(array(1, $getid));
            $_SESSION['cle'] = $getcle;
            header('Location: ../../index.php');
        } else {
            $_SESSION['cle'] = $getcle;
            header('Location: ../../index.php');
        }
    } else {
        echo'Votre clé est incorrecte';
    }
} else {
    echo 'Aucun utilisateur trouvé';
}
?>