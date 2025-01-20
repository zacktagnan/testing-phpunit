<?php

namespace Tests;

use App\Product;
use App\ShoppingCart;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ShoppingCartTest extends TestCase
{
    protected $shoppingCart;
    protected $defaultProductName = 'PcBox';
    protected $defaultProductPrice = 1128;

    protected function setUp(): void
    {
        parent::setUp();

        $this->shoppingCart = new ShoppingCart();
    }

    #[Test]
    public function it_is_false_that_shopping_cart_is_empty()
    {
        $this->assertFalse($this->shoppingCart->hasProducts());
    }

    #[Test]
    public function it_is_true_that_shopping_cart_has_prodcuts()
    {
        $this->shoppingCart->addProduct(new Product($this->defaultProductName, $this->defaultProductPrice));
        $this->assertTrue($this->shoppingCart->hasProducts());
    }
}
