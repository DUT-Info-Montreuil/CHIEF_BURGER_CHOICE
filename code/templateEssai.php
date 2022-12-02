<!DOCTYPE html>
<html>
    <head>
        <!-- basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Spicyo</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="css/styleTest.css">
    </head>

    <body>
        <header>
            <li class="button_user">
                <a class="button active" href="index.php?module=mod_connexion&action=connecter">Connexion</a>
                <a class="button" href="index.php?module=mod_connexion&action=inscription">Inscription</a>
                <a class="button" href="index.php?module=mod_plat&action=choix_plat">creer plat</a>
                <a class="button" href="index.php?module=mod_plat&action=afficher_menus">choix plat</a>
            </li>
        </header>
      
            <?php							
                echo $mod->controleur->getVue()->getTampon();
            ?>
 
    </body>

    <footer>
        <p>© 2022 All Rights Reserved. Design by<a href="https://html.design/"> Marwan,Naoufel et Boulaye</a></p>
    </footer>
</html>