<?php

namespace Fifthgate\CalendarGenerator\Service\Interfaces;

use Fifthgate\CalendarGenerator\Domain\Interfaces\CalendarYearInterface;

interface CalendarGeneratorServiceInterface
{
    public static function generateCalendarYear(int $year) : CalendarYearInterface;
}
