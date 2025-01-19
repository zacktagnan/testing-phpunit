<?php

namespace Tests;

use App\TaxesCalculator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Tests\DataProviders\TaxesCalculatorDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

class TaxesCalculatorTest extends TestCase
{
    protected $taxesCalculator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->taxesCalculator = new TaxesCalculator();
    }

    #[Test]
    #[DataProviderExternal(TaxesCalculatorDataProvider::class, 'provideValuesAndTaxes')]
    public function calculateCorrectTaxForGivenValue($value, $tax, $expected)
    {
        $tax = $this->taxesCalculator->getTax($value, $tax);
        $this->assertEquals($expected, $tax);
    }

    #[Test]
    #[DataProviderExternal(TaxesCalculatorDataProvider::class, 'provideValuesPlusTaxes')]
    public function calculateCorrectTaxAdditionForGivenValue($value, $tax, $expected)
    {
        $finalValue = $this->taxesCalculator->getValuePlusTax($value, $tax);
        $this->assertEquals($expected, $finalValue);
    }
}
