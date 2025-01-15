<?php

namespace Tests;

use App\ReadTimeCalculator;
// use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\DataProviders\ReadTimeCalculatorDataProvider;

class ReadTimeCalculatorTest extends TestCase
{
    // Sin el uso de Data Providers...
    // ----------------------------------------------------------------------------------
    /*public function testReadTimeInMinutesOfOneWord()
    {
        $readTimeCalculator = new ReadTimeCalculator('Aloha!');
        $minutes = $readTimeCalculator->getReadTimeInMinutes();

        $this->assertEquals(1, $minutes);
    }

    public function testReadTimeInMinutesOf220Word()
    {
        $readTimeCalculator = new ReadTimeCalculator(str_repeat('word ', 220));
        $minutes = $readTimeCalculator->getReadTimeInMinutes();

        $this->assertEquals(2, $minutes);
    }

    public function testReadTimeInMinutesOf1420Word()
    {
        $readTimeCalculator = new ReadTimeCalculator(str_repeat('word ', 1420));
        $minutes = $readTimeCalculator->getReadTimeInMinutes();

        $this->assertEquals(8, $minutes);
    }*/

    // Con el uso de Data Providers...
    // ----------------------------------------------------------------------------------
    // Data Providers locales en el propio archivo de test:...
    // // ----------------------------------------------------------------------------------
    // public static function provideTextAndExpectedMinutes() : array
    // {
    //     return [
    //         // Texto a pasar, Tiempo Esperado de Lectura en Minutos, Palabras por Minuto
    //         ['Aloha!', 1, 200],
    //         [str_repeat('word ', 220), 2, 200],
    //         [str_repeat('word ', 1420), 8, 200],
    //         [str_repeat('word ', 1000), 10, 100],
    //     ];
    // }

    // public static function provideTextAndExpectedHours() : array
    // {
    //     return [
    //         // Texto a pasar, Tiempo Esperado de Lectura en Horas, Palabras por Minuto
    //         '220 words, 0:02 expected, default speed' => [str_repeat('word ', 220), '0:02', 200],
    //         '600 words, 0:03 expected, default speed' => [str_repeat('word ', 600), '0:03', 200],
    //         '50000 words, 0:01 expected, default speed' => [str_repeat('word ', 50000), '4:10', 200],
    //         '600 words, 0:02 expected, 300 custom speed' => [str_repeat('word ', 600), '0:02', 300],
    //     ];
    // }
    // ----------------------------------------------------------------------------------

    // ----------------------------------------------------------------------------------
    // Data Providers locales en el propio archivo de test:...
    // ----------------------------------------------------------------------------------
    // #[DataProvider('provideTextAndExpectedMinutes')]
    // ----------------------------------------------------------------------------------
    // Data Providers desde archivo externo
    // ----------------------------------------------------------------------------------
    #[DataProviderExternal(ReadTimeCalculatorDataProvider::class, 'provideTextAndExpectedMinutes')]
    public function testReadTimeInMinutes($text, $expectedMinutes, $wordPerMinute)
    {
        $readTimeCalculator = new ReadTimeCalculator($text, $wordPerMinute);
        $minutes = $readTimeCalculator->getReadTimeInMinutes();

        $this->assertEquals($expectedMinutes, $minutes);
    }

    // #[DataProvider('provideTextAndExpectedHours')]
    #[DataProviderExternal(ReadTimeCalculatorDataProvider::class, 'provideTextAndExpectedHours')]
    public function testReadTimeInHours($text, $expectedHours, $wordPerMinute)
    {
        $readTimeCalculator = new ReadTimeCalculator($text, $wordPerMinute);
        $this->assertEquals($expectedHours, $readTimeCalculator->getReadTimeInHours());
    }
}
