<?php

namespace App;

class Product
{
    private $taxPercentage = 21;

    public function __construct(private string $name, private int|float $price)
    {}

    public function getPrice(): int|float
    {
        return $this->price;
    }

    public function getTaxValue(): int|float
    {
        $taxesCalculator = new TaxesCalculator();
        return $taxesCalculator->getTax($this->price, $this->taxPercentage);
    }

    public function getPricePlusTaxValue(): int|float
    {
        $taxesCalculator = new TaxesCalculator();
        return $taxesCalculator->getValuePlusTax($this->price, $this->taxPercentage);
    }

    public function getSummary(): string
    {
        return sprintf('El NOMBRE del producto es "%s" y tiene un precio de [%g].', $this->name, $this->price);
    }
}
