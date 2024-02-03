<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarPeriodInterface;
use DateTimeInterface;

interface CalendarDayInterface extends CalendarPeriodInterface
{
    public function getDate(): DateTimeInterface;
}
