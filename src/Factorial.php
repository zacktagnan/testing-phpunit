<?php

namespace App;

class Factorial
{
    public function calculate(int $num): int
    {
        if ($num < 0) {
            return -1;
            // Se decide devolver -1 a modo de notificación pues el factorial de algo negativo no tiene sentido como el de 0.
        }
        else if ($num <= 1) {
            return 1;
        }
        return $num * $this->calculate($num - 1);
    }
}
