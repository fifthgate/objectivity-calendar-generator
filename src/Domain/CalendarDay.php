<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarDayInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\AbstractCalendarPeriod;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use DateTimeInterface;

class CalendarDay extends AbstractCalendarPeriod implements CalendarDayInterface
{
    protected $events;

    public function getPeriodType(): string
    {
        return 'day';
    }

    public function getDate(): DateTimeInterface
    {
        return $this->getPeriodStart();
    }

    public function injectEvents(CalendarRenderableEventCollectionInterface $events)
    {
        $this->events = $events;
    }

    public function getEvents(): ?CalendarRenderableEventCollectionInterface
    {
        return $this->events;
    }
}
