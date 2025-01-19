<?php

namespace App;

class TaxesCalculator
{
    public function getTax(int|float $value, int $tax): int|float
    {
        return round($value * $tax / 100, 2);
    }

    public function getValuePlusTax(int|float $value, int $tax): int|float
    {
        return $value + $this->getTax($value, $tax);
    }
}
