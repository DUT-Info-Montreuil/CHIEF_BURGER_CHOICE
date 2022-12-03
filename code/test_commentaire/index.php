<meta charset="utf-8"/>

<?php  
$bdd = new PDO('mysql:host=localhost;dbname=cbc;', 'dutinfopw201653', 'vyzepuru');
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $getid = $_GET['id'];

    $article = $bdd->prepare('SELECT * FROM test_article where id = ?');
    $article->execute(array($getid));
    if($article->rowCount()>0){
        $article = $article->fetch();
    }
    
    if(isset($_POST['submit_commentaire'])){
        if (isset($_POST['pseudo'], $_POST['commentaire']) and !empty($_POST['pseudo']) and !empty($_POST['commentaire'])) {
            $pseudo = $_POST['pseudo'];
            $commentaire = ($_POST['commentaire']);

            $requete = $bdd->prepare('INSERT INTO test_commentaire (pseudo, commentaire, id_article) VALUES (?, ?, ?)');
            $requete->execute(array($pseudo, $commentaire, $getid));
            $msg = "<span style='color:green'>Le commentaire a été posté </span> <br>";
        } else {
            $msg = "ERREUR: Tous les champs doivent être remplies";
        }
    }

    $les_commentaires = $bdd->prepare('SELECT * FROM test_commentaire where id_article = ? ORDER BY id DESC');
    $les_commentaires->execute(array($getid));


?>

<h2>Burger: </h2>
<p> <?= $article['contenu'] ?></p>
<br>
<h2> 
    <?php 
    $requete = $bdd->prepare('SELECT count(id) FROM test_commentaire where id_article = ?');
    $requete->execute(array($getid));
    $resultat = $requete->fetch();    
    echo $resultat['count(id)'];
    ?> 
    Commentaires : </h2>
<form method="POST">
    <input type="text" name="pseudo" placeholder="Votre pseudo"> <br>
    <textarea name="commentaire" placeholder="Votre commentaire"></textarea> <br>
    <input type="submit" value= "Poster" name="submit_commentaire" />
</form>

<?php 
    if (isset($msg)){
        echo $msg;
    }
?>
<br>
<?php 
    while($com = $les_commentaires->fetch()){  ?>
        <b><?=$com['pseudo'] ?> : </b> <?= $com['commentaire'] ?><br>
<?php } 
}
?>