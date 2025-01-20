<?php

namespace Tests;

use App\TimeCalculator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Tests\DataProviders\TimeCalculatorDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

class TimeCalculatorTest extends TestCase
{
    protected $timeCalculator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->timeCalculator = new TimeCalculator();
    }

    #[Test]
    public function it_is_correct_that_sixty_minutes_equals_to_one_hour_and_zero_miutes()
    {
        [$hours, $minutes] = $this->timeCalculator->convertMinutesInHoursAndMinutes(60);
        $this->assertEquals(1, $hours);
        $this->assertEquals(0, $minutes);
    }

    #[Test]
    #[DataProviderExternal(TimeCalculatorDataProvider::class, 'provideMinutesToHoursAndMinutes')]
    public function it_is_correct_that_some_minutes_equals_to_some_hour_and_some_miutes($minutes, $expectedHours, $expectedMinutes)
    {
        [$hours, $minutes] = $this->timeCalculator->convertMinutesInHoursAndMinutes($minutes);
        $this->assertEquals($expectedHours, $hours);
        $this->assertEquals($expectedMinutes, $minutes);
    }

    #[Test]
    public function it_is_true_that_minutes_conversion_return_an_array()
    {
        $minutes = 60;
        $returnedResult = $this->timeCalculator->convertMinutesInHoursAndMinutes($minutes);
        $this->assertIsArray($returnedResult);
    }
}
