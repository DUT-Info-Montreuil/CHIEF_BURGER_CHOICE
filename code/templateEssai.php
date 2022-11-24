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
    </head>

    <body>
        <header>
            <li class="button_user">
                <a class="button active" href="index.php?module=mod_connexion&action=connecter">Connexion</a>
                <a class="button" href="index.php?module=mod_connexion&action=inscription">Inscription</a>
            </li>
        </header>
        <main>
            <?php							
                echo $mod->controleur->getVue()->getTampon();
            ?>
        </main>
    </body>

    <footer>
        <p>© 2022 All Rights Reserved. Design by<a href="https://html.design/"> Marwan,Naoufel et Boulaye</a></p>
    </footer>
</html>