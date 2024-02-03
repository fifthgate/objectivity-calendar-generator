<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarDayCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarWeekCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarDayInterface;

interface CalendarMonthInterface extends CalendarPeriodInterface
{
    public function setDays(CalendarDayCollectionInterface $days);

    public function getDays(): CalendarDayCollectionInterface;

    public function setWeeks(CalendarWeekCollectionInterface $weeks);

    public function getWeeks(): CalendarWeekCollectionInterface;

    public function getDay(int $dayNumber): ?CalendarDayInterface;

    public function getWeekByISOWeekNumber(string $weekNumber): ?CalendarWeekInterface;
}
