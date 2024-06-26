<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Collection;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarPeriodCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarMonthCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\AbstractCalendarPeriodCollection;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarDayCollectionInterface;

class CalendarMonthCollection extends AbstractCalendarPeriodCollection implements CalendarMonthCollectionInterface
{
}
