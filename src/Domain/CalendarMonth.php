<?php

namespace Fifthgate\CalendarService\Domain;

use Services\CalendarGenerator\Domain\Interfaces\CalendarMonthInterface;
use Services\CalendarGenerator\Domain\AbstractCalendarPeriod;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarDayCollectionInterface;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarWeekCollectionInterface;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use Services\CalendarGenerator\Domain\Interfaces\CalendarDayInterface;
use Services\CalendarGenerator\Domain\Interfaces\CalendarWeekInterface;

class CalendarMonth extends AbstractCalendarPeriod implements CalendarMonthInterface
{
    protected $days;

    protected $weeks;

    public function getPeriodType() : string
    {
        return 'month';
    }


    public function setDays(CalendarDayCollectionInterface $days)
    {
        $this->days = $days;
    }

    public function getDays() : CalendarDayCollectionInterface
    {
        return $this->days;
    }

    public function injectEvents(CalendarRenderableEventCollectionInterface $events)
    {
        $this->events = $events;

        foreach ($this->getWeeks() as $week) {
            $filteredEvents = $events->filterBetweenDates($week->getPeriodStart(), $week->getPeriodEnd());
            $week->injectEvents($filteredEvents);
        }

        foreach ($this->getDays() as $day) {
            $day->injectEvents($events->filterBetweenDates($day->getPeriodStart(), $day->getPeriodEnd()));
        }
    }

    public function getEvents() : ? CalendarRenderableEventCollectionInterface
    {
        return $this->events;
    }


    public function setWeeks(CalendarWeekCollectionInterface $weeks)
    {
        $this->weeks = $weeks;
    }

    public function getWeeks() : CalendarWeekCollectionInterface
    {
        return $this->weeks;
    }

    public function getDay(int $dayNumber) : ? CalendarDayInterface
    {
        foreach ($this->days as $day) {
            if ($day->getPeriodStart()->format('j') == $dayNumber) {
                return $day;
            }
        }
        return null;
    }

    public function getWeekByISOWeekNumber(string $weekNumber) : ? CalendarWeekInterface
    {
        foreach ($this->weeks as $week) {
            if ($week->getISOWeekNumber() == $weekNumber) {
                return $week;
            }
        }
        return null;
    }

    public function getNthWeek(int $n)
    {
        return $this->weeks->nth($n);
    }
}
