<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarMonthCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarMonthInterface;

interface CalendarYearInterface extends CalendarPeriodInterface
{
    public function setMonths(CalendarMonthCollectionInterface $months);
    
    public function getMonths() : CalendarMonthCollectionInterface;

    public function getMonth(int $monthNumber) : ? CalendarMonthInterface;
}
