<?php

namespace Services\CalendarGenerator\Domain\Collection;

use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarPeriodCollectionInterface;
use Services\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;

/**
 * @codeCoverageIgnore
 */
abstract class AbstractCalendarPeriodCollection implements CalendarPeriodCollectionInterface
{
    protected $collection = [];

    protected $position;

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->collection[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function valid()
    {
        return isset($this->collection[$this->position]);
    }

    public function add(CalendarPeriodInterface $calendarPeriod)
    {
        $this->collection[] = $calendarPeriod;
    }

    public function delete($key) : bool
    {
        if (isset($this->collection[$key])) {
            unset($this->collection[$key]);
            return true;
        }
        return false;
    }

    public function isEmpty() : bool
    {
        return empty($this->collection);
    }

    public function flush()
    {
        $this->collection = [];
    }

    public function sortCollection(callable $sortRoutine) : CalendarPeriodCollectionInterface
    {
        //
    }

    public function filter(callable $filterRoutine) : CalendarPeriodCollectionInterface
    {
        //
    }

    public function slice(int $length) : array
    {
        return array_chunk($this->collection, $length);
    }

    public function hasID(int $id) :bool
    {
        foreach ($this->collection as $item) {
            if ($item->getID() == $id) {
                return true;
            }
        }
        return false;
    }

    public function replace(int $position, CalendarPeriodInterface $payload)
    {
        $this->collection[$position] = $payload;
    }

    public function nth(int $n) : ? CalendarPeriodInterface
    {
        return isset($this->collection[$n - 1]) ? $this->collection[$n - 1] : null;
    }

    public function count() : int
    {
        return count($this->collection);
    }
}
