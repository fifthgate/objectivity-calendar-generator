<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces;

use \DateTimeInterface;

interface CalendarRenderableEventInterface
{
    public function getTitle() : string;

    public function getBody() : string;

    public function getPreview() : string;

    public function getStartDate() : DateTimeInterface;

    public function getEndDate() : DateTimeInterface;
}
