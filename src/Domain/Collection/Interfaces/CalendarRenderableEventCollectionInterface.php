<?php

namespace Services\CalendarGenerator\Domain\Collection\Interfaces;

use \DateTimeInterface;
use Services\Core\Domain\Collection\Interfaces\DomainEntityCollectionInterface;

interface CalendarRenderableEventCollectionInterface extends DomainEntityCollectionInterface
{
    public function filterBetweenDates(DateTimeInterface $start, DateTimeInterface $end, bool $includeEndPoints = true, bool $allowOverlaps = true) : ? CalendarRenderableEventCollectionInterface;
}
