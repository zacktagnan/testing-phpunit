<?php

namespace App\Interfaces;

interface IPaymentService {
    public function processPayment(int|float $priceSummatory);
}
