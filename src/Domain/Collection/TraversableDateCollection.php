<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Collection;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\TraversableDateCollectionInterface;
use DateTimeInterface;
use Fifthgate\Objectivity\Core\Domain\Collection\AbstractIterator;
use DatePeriod;

class TraversableDateCollection extends AbstractIterator implements TraversableDateCollectionInterface
{
    /**
     * Add a date to the end of the collection
     *
     * @param DateTimeInterface $date The date to add.
     */
    public function add(DateTimeInterface $date)
    {
        $this->collection[] = $date;
    }

    /**
     * Get an item from the collection by numeric key, if such a thing exists.
     *
     * @param  int    $key The numeric key
     *
     * @return DateTimeInterface|null The date corresponding to the key, or null if not set.
     */
    public function getKey(int $key): ?DateTimeInterface
    {
        return isset($this->collection[$key]) ? $this->collection[$key] : null;
    }


    /**
     * Sort the collection using usert and a callable (Usuaully a closure)
     *
     * @param callable $sortRoutine A callable routine obeying usort return rules.
     *
     * @return TraversableDateCollectionInterface This collection, as usort works on the original array rather than a copy.
     */
    public function sortCollection(callable $sortRoutine): TraversableDateCollectionInterface
    {
        usort($this->collection, $sortRoutine);
        return $this;
    }

    /**
     * Arbitrarily filter the collection using a callable.
     *
     * @param callable $filterRoutine A callable filter routine. Should return TRUE if the item belongs in the collection, false if not. Receives the complete item as a parameter.
     *
     * @return TraversableDateCollectionInterface A freshly filtered collection
     */
    public function filter(callable $filterRoutine): TraversableDateCollectionInterface
    {
        $filteredCollection = new $this();
        foreach ($this->collection as $item) {
            if ($filterRoutine($item)) {
                $filteredCollection->add($item);
            }
        }
        return $filteredCollection;
    }

    /**
     * Get the first item in the collection, as currently sorted.
     *
     * @return DateTimeInterface The First item in the collection
     */
    public function first(): ?DateTimeInterface
    {
        $unsortedCollection = $this->collection;
        $unsortedCollection = array_reverse($unsortedCollection);
        $item = array_pop($unsortedCollection);
        if ($item instanceof DateTimeInterface) {
            return $item;
        }
        return null;
    }

    /**
     * Get the last item in the collection, as currently sorted.
     *
     * @return DateTimeInterface The last item in the collection
     */
    public function last(): ?DateTimeInterface
    {
        $unsortedCollection = $this->collection;
        $item = array_pop($unsortedCollection);
        if ($item instanceof DateTimeInterface) {
            return $item;
        }
        return null;
    }

    public static function makeFromDatePeriod(DatePeriod $period): TraversableDateCollectionInterface
    {
        $collection = new self();
        foreach ($period as $date) {
            $collection->add($date);
        }
        return $collection;
    }
}
