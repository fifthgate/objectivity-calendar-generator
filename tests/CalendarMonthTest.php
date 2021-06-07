<?php

namespace Tests\Feature\Calendar;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Fifthgate\Objectivity\CalendarGenerator\Domain\CalendarMonth;
use Fifthgate\Objectivity\CalendarGenerator\Service\CalendarGeneratorService;
use Carbon\Carbon;
use Fifthgate\Objectivity\CalendarGenerator\Tests\CalendarServiceTestCase;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarRenderableEventInterface;

class CalendarMonthTest extends CalendarServiceTestCase
{
    public function testCalendarMonth()
    {
        $startDate = new Carbon('2012-01-01');
        $endDate = $startDate->endOfMonth();
        $calendarMonth = CalendarGeneratorService::generateCalendarMonth($startDate, $endDate);
        $this->assertEquals('month', $calendarMonth->getPeriodType());
        $events = $this->generateTestEvents('2012');
        $calendarMonth->injectEvents($events);
        $this->assertTrue($calendarMonth->isWithin($startDate, $endDate));
        
        $this->assertTrue($calendarMonth->hasEvents());
        $this->assertTrue($calendarMonth->isWithin($startDate, $endDate));
        $this->assertFalse($calendarMonth->isWithin($startDate, $endDate, false));
        $this->assertInstanceOf(CalendarRenderableEventCollectionInterface::class, $calendarMonth->getEvents());
        $this->assertEquals(2, $calendarMonth->getEvents()->count());
        foreach ($calendarMonth->getEvents() as $event) {
            $this->assertInstanceOf(CalendarRenderableEventInterface::class, $event);
        }
    }
}
