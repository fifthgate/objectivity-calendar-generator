<?php

namespace Fifthgate\CalendarService\Service\Interfaces;

use Fifthgate\CalendarService\Domain\Interfaces\CalendarYearInterface;

interface CalendarGeneratorServiceInterface
{
    public static function generateCalendarYear(int $year) : CalendarYearInterface;
}
