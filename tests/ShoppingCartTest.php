<?php

namespace Tests;

use App\Product;
use App\ShoppingCart;
use Exception;
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
    public function it_is_true_that_shopping_cart_has_products()
    {
        $this->shoppingCart->addProduct(new Product($this->defaultProductName, $this->defaultProductPrice));
        $this->assertTrue($this->shoppingCart->hasProducts());
    }

    // #[Test]
    // public function it_is_true_that_shopping_cart_has_an_array_of_products()
    // {
    //     $this->assertIsArray($this->shoppingCart->getProducts());
    // }

    #[Test]
    public function it_is_true_that_shopping_cart_has_an_array_of_products_but_empty()
    {
        $this->assertIsArray($this->shoppingCart->getProducts());
        $this->assertEmpty($this->shoppingCart->getProducts());
    }

    #[Test]
    public function it_is_true_that_shopping_cart_has_a_correct_total_products_and_others()
    {
        $this->assertCount(0, $this->shoppingCart->getProducts());
        $mouse = new Product('Logitech', 74);
        $this->shoppingCart->addProduct($mouse);
        $this->assertCount(1, $this->shoppingCart->getProducts());
        $this->assertContains($mouse, $this->shoppingCart->getProducts());
        $this->shoppingCart->removeProduct($mouse);
        $this->assertNotContains($mouse, $this->shoppingCart->getProducts());
        $this->assertCount(0, $this->shoppingCart->getProducts());

        $this->assertContainsOnlyInstancesOf(Product::class, $this->shoppingCart->getProducts());
    }

    #[Test]
    public function an_exception_is_thrown_when_product_to_remove_not_exist_in_shopping_cart()
    {
        $mouse = new Product('Logitech', 74);
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('El PRODUCTO a eliminar no se encuentra en el Carrito.');
        $this->shoppingCart->removeProduct($mouse);
    }
}
