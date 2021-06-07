<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Collection;

use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Traits\CalendarEventCollectionFilterTrait;
use Fifthgate\Objectivity\Core\Domain\Collection\AbstractDomainEntityCollection;

class CalendarEventCollection extends AbstractDomainEntityCollection implements CalendarRenderableEventCollectionInterface
{
    use CalendarEventCollectionFilterTrait;
}
