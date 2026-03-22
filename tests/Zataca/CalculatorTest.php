<?php

namespace Tests\Zataca;

use App\Zataca\Calculator;
use DivisionByZeroError;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[Group('zat_calculator')]
class CalculatorTest extends TestCase
{
    #[Test]
    public function it_adds_two_numbers()
    {
        // GIVEN | ARRANGE       (DADO     | PREPARADO/PREPARACIÓN/PREPARATORIA)
        // Dado cierto escenario o caso concreto, ...
        $calculator = new Calculator();
        $firstNumber = 7;
        $secondNumber = 4;
        $expectedResult = 11;

        // WHEN  | ACT           (CUANDO   | ACTUAR/EJECUCIÓN/LLAMADA)
        // ...cuando se actúa/ejecuta cierto código o acción, ...
        $result = $calculator->add($firstNumber, $secondNumber);

        // THEN  | ASSERT        (ENTONCES | VERIFICAR/VERIFICACIÓN/VALIDACIÓN)
        // ...entonces se espera cierto resultado o comportamiento.
        // o se verifica que se da el resultado esperado.
        $this->assertEquals($expectedResult, $result);
    }

    #[Test]
    public function it_receives_domain_exception_when_it_tries_to_divide_by_zero()
    {
        // GIVEN | ARRANGE       (DADO     | PREPARADO/PREPARACIÓN/PREPARATORIA)
        // Dado cierto escenario o caso concreto, ...
        $calculator = new Calculator();
        $firstNumber = 2;
        $secondNumber = 0;

        // THEN  | ASSERT        (ENTONCES | VERIFICAR/VERIFICACIÓN/VALIDACIÓN)
        // ...entonces se espera cierto resultado o comportamiento.
        // o se verifica que se da el resultado esperado.
        $this->expectException(DivisionByZeroError::class);

        // WHEN  | ACT           (CUANDO   | ACTUAR/EJECUCIÓN/LLAMADA)
        // ...cuando se actúa/ejecuta cierto código o acción, ...
        $calculator->divide($firstNumber, $secondNumber);
    }
}
