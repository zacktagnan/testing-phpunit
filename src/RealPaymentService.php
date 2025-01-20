<?php

namespace App;

use App\Interfaces\IPaymentService;

class RealPaymentService implements IPaymentService
{
    public function processPayment(int|float $priceSummatory)
    {
        // echo "Conectando con la pasarela de pago para efectuar la transacción de la cantidad: [$priceSummatory]";
        // Realizando pago dentro de la pasarela...
        return true;
    }
}
