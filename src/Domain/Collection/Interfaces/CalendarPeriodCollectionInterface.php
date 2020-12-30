<?php

namespace Services\CalendarGenerator\Domain\Collection\Interfaces;

use \Iterator;
use Services\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;

interface CalendarPeriodCollectionInterface extends Iterator
{
    public function add(CalendarPeriodInterface $calendarPeriod);

    public function delete($key) : bool;

    public function isEmpty() : bool;

    public function flush();

    public function sortCollection(callable $sortRoutine) : CalendarPeriodCollectionInterface;

    public function filter(callable $filterRoutine) : CalendarPeriodCollectionInterface;

    public function slice(int $length) : array;

    public function hasID(int $id) :bool;

    public function count() : int;
}
