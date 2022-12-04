<html>
<body>
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&components=YOUR_COMPONENTS"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&components=buttons"></script>

<?php
$panier = new Panier();
?>

<div class="container py-5">
    <h1>Panier</h1>
    <div class="list">
        <?php foreach ($panier->getProducts() as $product): ?>
            <div class ="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <?= $product['name'] ?>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <?= money($product['price']) ?> €
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <?php
    $payment = new PaypalPayment();
    echo $payment->ui($panier);
    ?>
</div>
</body>
</html>