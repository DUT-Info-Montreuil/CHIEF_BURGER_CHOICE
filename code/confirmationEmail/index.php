<?php 
session_start();
if (!$_SESSION['cle']){
    header('Location: connexion.php');
}
echo "ouais";
?>