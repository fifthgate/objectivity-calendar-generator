<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use DateTimeInterface;

interface CalendarPeriodInterface
{
    public function getPeriodType(): string;

    public function setPeriodName(string $name);

    public function getPeriodName(): string;

    public function injectEvents(CalendarRenderableEventCollectionInterface $events);

    public function getEvents(): ?CalendarRenderableEventCollectionInterface;

    public function getPeriodStart(): DateTimeInterface;

    public function getPeriodEnd(): DateTimeInterface;

    public function isWithin(DateTimeInterface $start, DateTimeInterface $end, bool $inclusive = true);

    public function hasEvents(): bool;
}
