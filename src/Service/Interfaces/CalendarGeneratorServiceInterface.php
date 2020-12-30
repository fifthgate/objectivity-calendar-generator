<?php

namespace Services\CalendarGenerator\Service\Interfaces;

use Services\CalendarGenerator\Domain\Interfaces\CalendarYearInterface;

interface CalendarGeneratorServiceInterface
{
    public static function generateCalendarYear(int $year) : CalendarYearInterface;
}
