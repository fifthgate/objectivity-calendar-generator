<?php

namespace Services\CalendarGenerator\Domain\Interfaces;

use Services\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use \DateTimeInterface;

interface CalendarDayInterface extends CalendarPeriodInterface
{
    public function getDate() : DateTimeInterface;
}
