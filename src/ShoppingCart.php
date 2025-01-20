<?php

namespace App;

class ShoppingCart
{
    private $products = [];

    public function hasProducts(): bool
    {
        return count($this->products) > 0;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }
}
