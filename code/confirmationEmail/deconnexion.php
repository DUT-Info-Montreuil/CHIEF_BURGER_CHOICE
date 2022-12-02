<?php 
session_start();
$_SESSION = array();
session_destroy();
header('Location: CHIEF_BURGER_CHOICE/code/index.php');
?>