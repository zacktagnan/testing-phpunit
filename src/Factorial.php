<?php

namespace App;

use InvalidArgumentException;

class Factorial
{
    public function calculate(int $num): int
    {
        if ($num < 0) {
            // return -1;
            // Se decide devolver -1 a modo de notificación pues el factorial de algo negativo no tiene sentido como el de 0.
            // ----------------------------------------------------------------------------------------------------------------------
            // Corregido al lanzar la excepción que, además, es controlada por el testFactorialOfNegativeNumberThrowException
            throw new InvalidArgumentException('El número pasado para calcular el factorial no puede ser negativo.');
        }
        else if ($num <= 1) {
            return 1;
        }
        return $num * $this->calculate($num - 1);
    }
}
