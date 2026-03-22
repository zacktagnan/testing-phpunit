<?php

namespace App\Zataca;

use DivisionByZeroError;

class Calculator
{
    public function add(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber + $secondNumber;
    }

    public function divide(float $firstNumber, float $secondNumber): float
    {
        if ($secondNumber === 0) {
            throw new DivisionByZeroError('División por 0');
        }

        return $firstNumber / $secondNumber;
    }
}
