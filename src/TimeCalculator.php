<?php

namespace App;

class TimeCalculator
{

    public function convertMinutesInHoursAndMinutes(int $minutes): array
    {
        $hours = intdiv($minutes, 60);
        $remainingMinutes = $minutes % 60;
        // return [
        //     'hours' => $hours,
        //     'minutes' => $remainingMinutes
        // ];
        // --------------------------------------------------
        return [$hours, $remainingMinutes];
    }
}
