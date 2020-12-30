<?php

namespace Fifthgate\CalendarGenerator\Domain\Interfaces;

use Fifthgate\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use Fifthgate\CalendarGenerator\Domain\Collection\Interfaces\CalendarDayCollectionInterface;
use Fifthgate\CalendarGenerator\Domain\Collection\Interfaces\CalendarWeekCollectionInterface;
use Fifthgate\CalendarGenerator\Domain\Interfaces\CalendarDayInterface;

interface CalendarWeekInterface extends CalendarPeriodInterface
{
    public function setDays(CalendarDayCollectionInterface $days);
    
    public function getDays() : CalendarDayCollectionInterface;

    public function setISOWeekNumber(string $weekNumber);

    public function getISOWeekNumber(): string;

    public function getDay(int $dayNumber) : ? CalendarDayInterface;
}
