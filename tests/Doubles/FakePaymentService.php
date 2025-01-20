<?php

namespace Tests\Doubles;

use App\Interfaces\IPaymentService;

class FakePaymentService implements IPaymentService
{
    public function processPayment(int|float $priceSummatory): bool
    {
        // echo "Conectando con la pasarela de pago para efectuar la transacción de la cantidad: [$priceSummatory]";
        // Simulación de pago dentro de la pasarela...
        return true;
    }
}
