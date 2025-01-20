<?php

namespace App;

class ReadTimeCalculator
{
    // private string $text;
    // private int $wordsPerMinute;

    // public function __construct(string $text, int $wordsPerMinute = 200)
    // {
    //     $this->text = $text;
    //     $this->wordsPerMinute = $wordsPerMinute;
    // }

    public function __construct(private string $text, private int $wordsPerMinute = 200)
    {}

    public function getReadTimeInMinutes(): int
    {
        $totalOfWords = str_word_count($this->text);
        return (int) ceil($totalOfWords / $this->wordsPerMinute);
    }

    public function getReadTimeInHours(): string
    {
        $minutes = $this->getReadTimeInMinutes();
        // $hoursAndMinutes = $this->convertMinutesInHoursAndMinutes($minutes);
        // return sprintf('%d:%02d', $hoursAndMinutes['hours'], $hoursAndMinutes['minutes']); // h:mm
        // -------------------------------------------------------------------------------------------
        // [$hours, $minutes] = $this->convertMinutesInHoursAndMinutes($minutes);
        // -------------------------------------------------------------------------------------------
        $timeCalculator = new TimeCalculator();
        [$hours, $minutes] = $timeCalculator->convertMinutesInHoursAndMinutes($minutes);
        return sprintf('%d:%02d', $hours, $minutes); // h:mm
    }

    // private function convertMinutesInHoursAndMinutes(int $minutes): array
    // {
    //     $hours = intdiv($minutes, 60);
    //     $remainingMinutes = $minutes % 60;
    //     // return [
    //     //     'hours' => $hours,
    //     //     'minutes' => $remainingMinutes
    //     // ];
    //     // --------------------------------------------------
    //     return [$hours, $remainingMinutes];
    // }
}
