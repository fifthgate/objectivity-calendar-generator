<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarDayInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarWeekInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\AbstractCalendarPeriod;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarDayCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarWeekCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;

class CalendarWeek extends AbstractCalendarPeriod implements CalendarWeekInterface
{
    protected $days;

    protected $weekNumber;

    public function getPeriodType(): string
    {
        return 'week';
    }


    public function setDays(CalendarDayCollectionInterface $days)
    {
        $this->days = $days;
    }

    public function getDays(): CalendarDayCollectionInterface
    {
        return $this->days;
    }

    public function getDay(int $dayNumber): ?CalendarDayInterface
    {
        foreach ($this->days as $day) {
            if ($day->getPeriodStart()->format('j') == $dayNumber) {
                return $day;
            }
        }
        return null;
    }

    public function injectEvents(CalendarRenderableEventCollectionInterface $events): CalendarWeekInterface
    {
        $this->events = $events;

        foreach ($this->getDays() as $day) {
            $day->injectEvents($events->filterBetweenDates($day->getPeriodStart(), $day->getPeriodEnd()));
        }

        return $this;
    }

    public function getEvents(): ?CalendarRenderableEventCollectionInterface
    {
        return $this->events;
    }

    public function setISOWeekNumber(string $weekNumber)
    {
        $this->weekNumber = $weekNumber;
    }

    public function getISOWeekNumber(): string
    {
        return $this->weekNumber;
    }
}
