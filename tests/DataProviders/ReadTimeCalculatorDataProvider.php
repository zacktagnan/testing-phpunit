<?php

namespace Tests\DataProviders;

class ReadTimeCalculatorDataProvider
{
    public static function provideTextAndExpectedMinutes() : array
    {
        return [
            // Texto a pasar, Tiempo Esperado de Lectura en Minutos, Palabras por Minuto
            ['Aloha!', 1, 200],
            [str_repeat('word ', 220), 2, 200],
            [str_repeat('word ', 1420), 8, 200],
            [str_repeat('word ', 1000), 10, 100],
        ];
    }

    public static function provideTextAndExpectedHours() : array
    {
        return [
            // Texto a pasar, Tiempo Esperado de Lectura en Horas, Palabras por Minuto
            '220 words, 0:02 expected, default speed' => [str_repeat('word ', 220), '0:02', 200],
            '600 words, 0:03 expected, default speed' => [str_repeat('word ', 600), '0:03', 200],
            '50000 words, 0:01 expected, default speed' => [str_repeat('word ', 50000), '4:10', 200],
            '600 words, 0:02 expected, 300 custom speed' => [str_repeat('word ', 600), '0:02', 300],
        ];
    }
}
