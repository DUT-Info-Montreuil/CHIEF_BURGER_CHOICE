<?php
$dest="noufnouf788@gmail.com";
$objet="Bienvenue dans notre restaurant";
$message="
    <font face='arial'>
    Bonjour et bienvenue.n
    Pour valider votre inscription vous devez écrire le code suivant 
    </font>
";
$entetes="Content-Type: text/html; charset=iso-8859-1";
$entetes.="From: chiefburgerchoice@gmail.com";

if(mail($dest,$objet,$message,$entetes))
    echo "Mail envoyé avec succès.";
else
    echo "Un problème est survenu.";
//mail($dest , $objet , $message , $entetes);
?>