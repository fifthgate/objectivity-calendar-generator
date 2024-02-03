<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces;

use DateTimeInterface;
use Fifthgate\Objectivity\Core\Domain\Collection\Interfaces\DomainEntityCollectionInterface;

interface CalendarRenderableEventCollectionInterface extends DomainEntityCollectionInterface
{
    public function filterBetweenDates(DateTimeInterface $start, DateTimeInterface $end, bool $includeEndPoints = true, bool $allowOverlaps = true): ?CalendarRenderableEventCollectionInterface;
}
