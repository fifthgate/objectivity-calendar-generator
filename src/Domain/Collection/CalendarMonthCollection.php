<?php

namespace Fifthgate\CalendarGenerator\Domain\Collection;

use Fifthgate\CalendarGenerator\Domain\Collection\Interfaces\CalendarPeriodCollectionInterface;
use Fifthgate\CalendarGenerator\Domain\Collection\Interfaces\CalendarMonthCollectionInterface;
use Fifthgate\CalendarGenerator\Domain\Collection\AbstractCalendarPeriodCollection;
use Fifthgate\CalendarGenerator\Domain\Collection\Interfaces\CalendarDayCollectionInterface;

class CalendarMonthCollection extends AbstractCalendarPeriodCollection implements CalendarMonthCollectionInterface
{
}
