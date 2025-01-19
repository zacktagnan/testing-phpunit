<?php

namespace Tests\DataProviders;

class TaxesCalculatorDataProvider
{
    public static function provideValuesAndTaxes() : array
    {
        return [
            // valor, %impuesto, esperado
            'Impuesto del 21% sobre un valor de 100' => [100, 21, 21],
            'Impuesto del 10% sobre un valor de 0' => [0, 10, 0],
            'Impuesto redondeado' => [1.42, 10, 0.14],
        ];
    }

    public static function provideValuesPlusTaxes() : array
    {
        return [
            // valor, %impuesto, esperado
            'Impuesto del 21% sobre un valor de 100' => [100, 21, 121],
            'Impuesto del 10% sobre un valor de 0' => [0, 10, 0],
            'Impuesto redondeado' => [1.42, 10, 1.56],
        ];
    }
}
