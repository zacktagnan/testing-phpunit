<?php

namespace Tests;

use App\Factorial;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class FactorialTest extends TestCase
{
    protected $factorial;

    protected function setUp(): void
    {
        parent::setUp();

        $this->factorial = new Factorial();
    }

    protected function tearDown(): void
    {
        $this->factorial = null;
        // echo "\ntearDown...";
    }


    public function testFactorialOfOne()
    {
        $this->assertEquals(1, $this->factorial->calculate(1));
    }

    public function testFactorialOfTwo()
    {
        $this->assertEquals(2, $this->factorial->calculate(2));
    }

    public function testFactorialOfZero()
    {
        $this->assertEquals(1, $this->factorial->calculate(0));
    }

    // public function testFactorialOfNegativeNumber()
    // {
    //     $this->assertEquals(-1, $this->factorial->calculate(-5));
    // }
    public function testFactorialOfNegativeNumberThrowException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->assertEquals(-1, $this->factorial->calculate(-5));
    }

    public function testFactorialOfTen()
    {
        $this->assertEquals(3628800, $this->factorial->calculate(10));
    }
}
