<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces;

use \Iterator;
use \DateTimeInterface;

interface TraversableDateCollectionInterface extends Iterator
{
    public function add(DateTimeInterface $date);

    public function isEmpty() : bool;

    public function first() : ? DateTimeInterface;

    public function last() : ? DateTimeInterface;

    public function getKey(int $key): ? DateTimeInterface;

    public function sortCollection(callable $sortRoutine) : TraversableDateCollectionInterface;

    public function filter(callable $filterRoutine) : TraversableDateCollectionInterface;
}
