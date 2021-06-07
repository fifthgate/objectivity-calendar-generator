<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Service\Interfaces;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarYearInterface;

interface CalendarGeneratorServiceInterface
{
    public static function generateCalendarYear(int $year) : CalendarYearInterface;
}
