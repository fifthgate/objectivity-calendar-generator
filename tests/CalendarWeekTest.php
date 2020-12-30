<?php

namespace Tests\Feature\Calendar;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Fifthgate\CalendarGenerator\Domain\CalendarMonth;
use Fifthgate\CalendarGenerator\Service\CalendarGeneratorService;
use Carbon\Carbon;
use Fifthgate\CalendarGenerator\Tests\CalendarServiceTestCase;
use Fifthgate\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use Fifthgate\CalendarGenerator\Domain\Interfaces\CalendarRenderableEventInterface;

class CalendarWeekTest extends CalendarServiceTestCase
{
    public function testCalendarWeek()
    {
        $startDate = new Carbon('2012-01-01');
        $endDate = $startDate->endOfWeek();
        $calendarWeek = CalendarGeneratorService::generateCalendarWeek($startDate, $endDate);
        $this->assertEquals('week', $calendarWeek->getPeriodType());
        $events = $this->generateTestEvents('2012');
        $calendarWeek->injectEvents($events);
        $this->assertTrue($calendarWeek->isWithin($startDate, $endDate));
        $this->assertFalse($calendarWeek->isWithin($startDate, $endDate, false));
        $this->assertTrue($calendarWeek->hasEvents());
        $this->assertInstanceOf(CalendarRenderableEventCollectionInterface::class, $calendarWeek->getEvents());
        $this->assertEquals(2, $calendarWeek->getEvents()->count());
        foreach ($calendarWeek->getEvents() as $event) {
            $this->assertInstanceOf(CalendarRenderableEventInterface::class, $event);
        }
    }
}
