<?php

namespace Services\CalendarGenerator\Domain\Collection;

use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use Services\CalendarGenerator\Domain\Collection\Traits\CalendarEventCollectionFilterTrait;
use Services\Core\Domain\Collection\AbstractDomainEntityCollection;

class CalendarEventCollection extends AbstractDomainEntityCollection implements CalendarRenderableEventCollectionInterface
{
    use CalendarEventCollectionFilterTrait;
}
