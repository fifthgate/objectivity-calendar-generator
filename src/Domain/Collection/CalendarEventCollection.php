<?php

namespace Fifthgate\CalendarGenerator\Domain\Collection;

use Fifthgate\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use Fifthgate\CalendarGenerator\Domain\Collection\Traits\CalendarEventCollectionFilterTrait;
use Services\Core\Domain\Collection\AbstractDomainEntityCollection;

class CalendarEventCollection extends AbstractDomainEntityCollection implements CalendarRenderableEventCollectionInterface
{
    use CalendarEventCollectionFilterTrait;
}
