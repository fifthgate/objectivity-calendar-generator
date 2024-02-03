<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Traits;

use DateTimeInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;

/**
 * @codeCoverageIgnore
 */
trait CalendarEventCollectionFilterTrait
{
    public function filterBetweenDates(DateTimeInterface $start, DateTimeInterface $end, bool $includeEndPoints = true, bool $allowOverlaps = true): ?CalendarRenderableEventCollectionInterface
    {
        return $allowOverlaps ? $this->filterBetweenDatesAllowingOverlaps($start, $end) : $this->filterBetweenDatesStrict($start, $end, $includeEndPoints);
    }

    private function filterBetweenDatesAllowingOverlaps(DateTimeInterface $start, DateTimeInterface $end)
    {
        $filteredCollection = new self();
        foreach ($this->collection as $event) {
            if (($event->getStartDate() >= $start && $event->getStartDate() <= $end) or ($event->getEndDate() >= $start && $event->getEndDate() <= $end)) {
                $filteredCollection->add($event);
            }
        }
        return $filteredCollection;
    }

    private function filterBetweenDatesStrict(DateTimeInterface $start, DateTimeInterface $end, bool $includeEndPoints = true)
    {
        $filteredCollection = new self();
        foreach ($this->collection as $event) {
            if ($includeEndPoints) {
                if ($event->getStartDate() >= $start && $event->getEndDate() <= $end) {
                    $filteredCollection->add($event);
                }
            } else {
                if ($event->getStartDate() > $start && $event->getEndDate() < $end) {
                    $filteredCollection->add($event);
                }
            }
        }
        return $filteredCollection;
    }
}
