<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Paiement</title>
    </head>
    <body>
        <form action="payment.php">
        <div>
            <input type="text" name="name" required placeholder="Votre nom"> <br>
            <input type="email" name="email" required placeholder="Votre adresse email"><br>
            <input type="text" placeholder="Votre code de carte bleu"><br>
            <input type="text" placeholder="Mois"><br>
            <input type="text" placeholder="Année"><br>
            <input type="text" placeholder="CVC"><br>
        </div>
        
        <p>
            <a href="/payment.php">Payer</a>
        </p>
        </form>
    </body>
</html>