<?php

namespace Services\CalendarGenerator\Domain\Interfaces;

use Services\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarMonthCollectionInterface;
use Services\CalendarGenerator\Domain\Interfaces\CalendarMonthInterface;

interface CalendarYearInterface extends CalendarPeriodInterface
{
    public function setMonths(CalendarMonthCollectionInterface $months);
    
    public function getMonths() : CalendarMonthCollectionInterface;

    public function getMonth(int $monthNumber) : ? CalendarMonthInterface;
}
