<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarYearInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\AbstractCalendarPeriod;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarMonthCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarMonthInterface;

class CalendarYear extends AbstractCalendarPeriod implements CalendarYearInterface
{
    protected $months;

    public function getPeriodType() : string
    {
        return 'year';
    }

    public function setMonths(CalendarMonthCollectionInterface $months)
    {
        $this->months = $months;
    }

    public function getMonths() : CalendarMonthCollectionInterface
    {
        return $this->months;
    }

    public function getMonth(int $monthNumber) : ? CalendarMonthInterface
    {
        foreach ($this->months as $month) {
            if ($month->getPeriodStart()->format('n') == $monthNumber) {
                return $month;
            }
        }
        return null;
    }

    public function injectEvents(CalendarRenderableEventCollectionInterface $events)
    {
        $this->events = $events;
        foreach ($this->getMonths() as $month) {
            $filteredEvents = $events->filterBetweenDates($month->getPeriodStart(), $month->getPeriodEnd());
            $month->injectEvents($filteredEvents);
        }
    }

    public function getEvents() : ? CalendarRenderableEventCollectionInterface
    {
        return $this->events;
    }
}
