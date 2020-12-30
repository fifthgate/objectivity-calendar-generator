<?php

namespace Fifthgate\CalendarGenerator\Domain\Collection\Interfaces;

use \DateTimeInterface;
use Fifthgate\Objectivity\Domain\Collection\Interfaces\DomainEntityCollectionInterface;

interface CalendarRenderableEventCollectionInterface extends DomainEntityCollectionInterface
{
    public function filterBetweenDates(DateTimeInterface $start, DateTimeInterface $end, bool $includeEndPoints = true, bool $allowOverlaps = true) : ? CalendarRenderableEventCollectionInterface;
}
