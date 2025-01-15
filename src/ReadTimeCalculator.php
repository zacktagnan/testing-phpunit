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
        $hours = intdiv($minutes, 60);
        $remainingMinutes = $minutes % 60;
        return sprintf('%d:%02d', $hours, $remainingMinutes); // h:mm
    }
}
