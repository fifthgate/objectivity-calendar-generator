<?php

namespace Tests\Feature\Calendar;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Services\CalendarGenerator\Domain\CalendarMonth;
use Services\CalendarGenerator\Service\CalendarGeneratorService;
use Carbon\Carbon;
use Services\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use Services\CalendarGenerator\Domain\Interfaces\CalendarRenderableEventInterface;
use Fifthgate\CalendarGenerator\Tests\CalendarServiceTestCase;

class CalendarDayTest extends CalendarServiceTestCase
{
    public function testCalendarDay()
    {
        $startDate = new Carbon('2012-01-01');
        $endDate = clone $startDate;
        $endDate->setTime(23, 59, 59);
        $calendarDay = CalendarGeneratorService::generateCalendarDay($startDate);
        $this->assertEquals('day', $calendarDay->getPeriodType());
        $this->assertTrue($calendarDay->isWithin($startDate, $endDate));
        $this->assertFalse($calendarDay->isWithin($startDate, $endDate, false));
        $events = $this->generateTestEvents('2012');
        $calendarDay->injectEvents($events);
        $this->assertTrue($calendarDay->hasEvents());
        $this->assertInstanceOf(CalendarRenderableEventCollectionInterface::class, $calendarDay->getEvents());
        $this->assertEquals(2, $calendarDay->getEvents()->count());
        foreach ($calendarDay->getEvents() as $event) {
            $this->assertInstanceOf(CalendarRenderableEventInterface::class, $event);
        }
    }
}
