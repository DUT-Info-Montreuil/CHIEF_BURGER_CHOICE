<?php

class Panier
{

    public function getProducts(): array{
        return [
            [
                'name' => 'Burger',
                'price' => 1000
            ],
            [
                'name' => 'Burger 2',
                'price' => 1200
            ]
        ];
    }

    public function getTotal(): int{
        return array_reduce($this->getProducts(), fn(int $acc, array $product) => $acc + $product['price'], 0);
    }
}
?>