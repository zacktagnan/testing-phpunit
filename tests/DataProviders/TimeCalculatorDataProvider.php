<?php

namespace Tests\DataProviders;

class TimeCalculatorDataProvider
{
    public static function provideMinutesToHoursAndMinutes() : array
    {
        return [
            // minutos dados, horas resultantes, minutos restantes
            '60 minutos a 1 hora y 0 minutos' => [60, 1, 0],
            '30 minutos a 0 horas y 30 minutos' => [30, 0, 30],
            '0 minutos a 0 horas y 0 minutos' => [0, 0, 0],
            '365 minutos a 6 horas y 5 minutos' => [365, 6, 5],
        ];
    }
}
