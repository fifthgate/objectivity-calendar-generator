<?php

namespace Services\CalendarGenerator\Domain\Interfaces;

use Services\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarDayCollectionInterface;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarWeekCollectionInterface;
use Services\CalendarGenerator\Domain\Interfaces\CalendarDayInterface;

interface CalendarWeekInterface extends CalendarPeriodInterface
{
    public function setDays(CalendarDayCollectionInterface $days);
    
    public function getDays() : CalendarDayCollectionInterface;

    public function setISOWeekNumber(string $weekNumber);

    public function getISOWeekNumber(): string;

    public function getDay(int $dayNumber) : ? CalendarDayInterface;
}
