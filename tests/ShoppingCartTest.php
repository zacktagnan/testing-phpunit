<?php

namespace Tests;

use App\Interfaces\IPaymentService;
use App\NotificationService;
use Exception;
use App\Product;
use App\ShoppingCart;
// use App\PaymentService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Tests\Doubles\FakePaymentService;

class ShoppingCartTest extends TestCase
{
    protected $shoppingCart;
    protected $defaultProductName = 'PcBox';
    protected $defaultProductPrice = 1128;

    protected $notificationService;

    protected function setUp(): void
    {
        parent::setUp();

        // $paymentService = new PaymentService();
        // $paymentService = new FakePaymentService();

        // $notificationService = new NotificationService();
        $this->notificationService = $this->createMock(NotificationService::class);

        $paymentService = $this->createStub(IPaymentService::class);
        $paymentService->method('processPayment')->willReturn(true);

        $this->shoppingCart = new ShoppingCart($paymentService, $this->notificationService);
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

    #[Test]
    public function checkout_cart_is_marked_as_paid()
    {
        $this->shoppingCart->checkout();
        $this->assertTrue($this->shoppingCart->isPaid());
    }

    #[Test]
    public function notification_sended_to_administrator_when_checkout_cart_is_paid()
    {
        $this->notificationService
            ->expects($this->once())
            ->method('send')
            // -> con dos párametros separados...
            // ->with(
            //     $this->equalTo('Peio <peio@app.es>'),
            //     $this->equalTo('Se ha efectuado un nuevo pago dentro de la Apli.')
            // );
            // -> con un ARRAY asociativo a modo de párametro único...
            // ->with([
            //     'to' => 'Peio <peio@app.es>',
            //     'content' => 'Se ha efectuado un nuevo pago dentro de la Apli.',
            // ]);
            // -> con parámetro(s) dinámico(s)...
            ->with(
                $this->callback(function($arg) {
                    return $this->verifyNotificationArguments($arg);
                })
            );

        $this->shoppingCart->checkout();
        // $this->assertTrue($this->shoppingCart->isPaid());
    }

    private function verifyNotificationArguments($arg)
    {
        return isset($arg['to'], $arg['content'])
            // && $arg['to'] === 'Peio <peio@app.es>'
            && preg_match('/@app.es>$/', $arg['to'])
            && $arg['content'] === 'Se ha efectuado un nuevo pago dentro de la Apli.';
    }
}
