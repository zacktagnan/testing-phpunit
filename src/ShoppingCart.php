<?php

namespace App;

use App\Interfaces\IPaymentService;
use Exception;

class ShoppingCart
{
    private $products = [];
    private $paid = false;

    public function __construct(private IPaymentService $paymentService, private NotificationService $notificationService)
    {}

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

    public function getPriceSummatory()
    {
        $priceSummatory = 0;
        foreach ($this->products as $product) {
            $priceSummatory += $product->price;
        }
        return $priceSummatory;
    }

    public function checkout(): bool
    {
        if ($this->paymentService->processPayment($this->getPriceSummatory())) {
            $this->paid = true;
            // -> con dos párametros separados...
            // $this->notificationService->send('Peio <peio@app.es>', 'Se ha efectuado un nuevo pago dentro de la Apli.');
            // -> con un ARRAY asociativo a modo de párametro único...
            $this->notificationService->send([
                'to' => 'Peio <peio@app.es>',
                'content' => 'Se ha efectuado un nuevo pago dentro de la Apli.'
            ]);
        }
        return false;
    }

    public function isPaid(): bool
    {
        return $this->paid;
    }
}
