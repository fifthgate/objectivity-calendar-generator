<?php

namespace Fifthgate\CalendarService\Domain;

use Services\CalendarGenerator\Domain\Interfaces\CalendarDayInterface;
use Services\CalendarGenerator\Domain\AbstractCalendarPeriod;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use \DateTimeInterface;

class CalendarDay extends AbstractCalendarPeriod implements CalendarDayInterface
{
    protected $events;
    
    public function getPeriodType() : string
    {
        return 'day';
    }

    public function getDate() : DateTimeInterface
    {
        return $this->getPeriodStart();
    }

    public function injectEvents(CalendarRenderableEventCollectionInterface $events)
    {
        $this->events = $events;
    }

    public function getEvents() : ? CalendarRenderableEventCollectionInterface
    {
        return $this->events;
    }
}
