<?php

namespace App;

use Exception;

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

    public function getProducts(): array
    {
        return $this->products;
    }

    public function removeProduct(Product $product): void
    {
        $index = array_search($product, $this->products, true);

        if ($index === false) {
            throw new Exception('El PRODUCTO a eliminar no se encuentra en el Carrito.');
        }

        unset($this->products[$index]);
    }
}
