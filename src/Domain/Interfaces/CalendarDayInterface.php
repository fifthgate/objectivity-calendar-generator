<?php

namespace Fifthgate\CalendarGenerator\Domain\Interfaces;

use Fifthgate\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use \DateTimeInterface;

interface CalendarDayInterface extends CalendarPeriodInterface
{
    public function getDate() : DateTimeInterface;
}
