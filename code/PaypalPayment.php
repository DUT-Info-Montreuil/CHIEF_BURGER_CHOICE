<?php

use Panier;

class PaypalPayment{

    public function ui(Panier $panier): string
    {
        $clientId = "T_oiC2.B";
        $order = json_encode([
            'purchase_units' => [
                [
                    'description' => 'Panier commande burger',
                    'items'       => array_map(function ($product) {
                        return [
                            'name'        => $product['name'],
                            'quantity'    => 1,
                            'unit_amount' => [
                                'value'         => number_format($product['price'] / 100, 2, '.', ""), 
                                'currency_code' => 'EUR',
                            ]
                        ];
                    }, $panier->getProducts()),
                    'amount'      => [
                        'currency_code' => 'EUR',
                        'value'         => number_format($panier->getTotal() / 100, 2, '.', ""),
                        'breakdown'     => [
                            'item_total' => [
                                'currency_code' => 'EUR',
                                'value'         => number_format($panier->getTotal() / 100, 2, '.', "")
                            ]
                        ]
                    ]
                ]
            ]
        ]);
        return <<<HTML
        <script src="https://www.paypal.com/sdk/js?client-id={$clientId}&currency=EUR&intent=authorize"></script>
        <div id="paypal-button-container"></div>
        <script>
          paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
              return actions.order.create({$order});
            },
            // Finalize the transaction after payer approval
            onApprove: async (data, actions) => {
              const authorization = await actions.order.authorize()
              const authorizationId = authorization.purchase_units[0].payments.authorizations[0].id
              await fetch('/paypal.php', {
                method: 'post',
                headers: {
                  'content-type': 'application/json'
                },
                body: JSON.stringify({authorizationId})
              })
              alert('Votre paiement a bien été enregistré')
            }
          }).render('#paypal-button-container');
        </script>
    HTML;
    }
}
?>