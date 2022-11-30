<?php
$dest="noufnouf788@gmail.com";
$objet="Bienvenue dans notre restaurant";
$message="
    Bonjour et bienvenue\n
    Voici le code pour valider votre inscription
";
$entetes="Content-Type: text/plain; charset=utf-8\r\n";
$entetes.="From: chiefburgerchoice@gmail.com\r\n";

if(mail($dest,$objet,$message,$entetes))
    echo "Mail envoyé avec succès.";
else
    echo "Un problème est survenu.";
//mail($dest , $objet , $message , $entetes);
?>