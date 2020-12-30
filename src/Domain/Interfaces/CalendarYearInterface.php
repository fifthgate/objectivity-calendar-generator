<?php

namespace Fifthgate\CalendarGenerator\Domain\Interfaces;

use Fifthgate\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use Fifthgate\CalendarGenerator\Domain\Collection\Interfaces\CalendarMonthCollectionInterface;
use Fifthgate\CalendarGenerator\Domain\Interfaces\CalendarMonthInterface;

interface CalendarYearInterface extends CalendarPeriodInterface
{
    public function setMonths(CalendarMonthCollectionInterface $months);
    
    public function getMonths() : CalendarMonthCollectionInterface;

    public function getMonth(int $monthNumber) : ? CalendarMonthInterface;
}
