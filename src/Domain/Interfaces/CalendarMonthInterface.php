<?php

namespace Services\CalendarGenerator\Domain\Interfaces;

use Services\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarDayCollectionInterface;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarWeekCollectionInterface;
use Services\CalendarGenerator\Domain\Interfaces\CalendarDayInterface;

interface CalendarMonthInterface extends CalendarPeriodInterface
{
    public function setDays(CalendarDayCollectionInterface $days);
    
    public function getDays() : CalendarDayCollectionInterface;

    public function setWeeks(CalendarWeekCollectionInterface $weeks);

    public function getWeeks() : CalendarWeekCollectionInterface;

    public function getDay(int $dayNumber) : ? CalendarDayInterface;

    public function getWeekByISOWeekNumber(string $weekNumber) : ? CalendarWeekInterface;
}
