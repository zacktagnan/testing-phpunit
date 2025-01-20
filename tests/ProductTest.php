<?php

namespace Tests;

use App\Product;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ProductTest extends TestCase
{
    protected $product;
    protected $defaultName = 'PcBox';
    protected $defaultPrice = 1128;

    protected function setUp(): void
    {
        parent::setUp();

        $this->product = new Product($this->defaultName, $this->defaultPrice);
    }

    #[Test]
    public function it_has_numeric_price()
    {
        $this->assertIsNumeric($this->product->getPrice());
    }

    #[Test]
    public function it_has_float_tax_value()
    {
        $this->assertIsFloat($this->product->getTaxValue());
    }

    #[Test]
    public function it_is_a_correct_tax_value()
    {
        $this->assertEquals(236.88, $this->product->getTaxValue());
    }

    #[Test]
    public function it_is_a_correct_value_the_addition_of_price_and_tax()
    {
        $this->assertSame(236.88 + $this->defaultPrice, $this->product->getPricePlusTaxValue());
    }

    #[Test]
    public function it_is_true_that_summary_contains_name()
    {
        $this->assertStringContainsString($this->defaultName, $this->product->getSummary());
    }

    #[Test]
    public function it_is_true_that_summary_contains_price()
    {
        $this->assertStringContainsString($this->defaultPrice, $this->product->getSummary());
    }
}
