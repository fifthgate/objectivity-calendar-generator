<?php

namespace Tests\Feature\Calendar;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Fifthgate\Objectivity\CalendarGenerator\Domain\CalendarMonth;
use Fifthgate\Objectivity\CalendarGenerator\Service\CalendarGeneratorService;
use Carbon\Carbon;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\Interfaces\CalendarRenderableEventCollectionInterface;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Interfaces\CalendarRenderableEventInterface;
use Fifthgate\Objectivity\CalendarGenerator\Tests\CalendarServiceTestCase;
use Fifthgate\Objectivity\CalendarGenerator\Domain\Collection\TraversableDateCollection;
use \DateInterval;
use \DatePeriod;

class TraversableDateCollectionTest extends CalendarServiceTestCase
{
    public function testCollection()
    {
        $date1 = new Carbon('1984-11-30');
        $date2 = new Carbon('1984-12-01');
        $date3 = new Carbon('1984-12-02');
        $date4 = new Carbon('1984-12-03');
        $dates = [
            $date1,
            $date2,
            $date3,
            $date4,
        ];

        $collection = new TraversableDateCollection;
        $this->assertTrue($collection->isEmpty());
        $this->assertNull($collection->first());
        $this->assertNull($collection->last());
        foreach ($dates as $date) {
            $collection->add($date);
        }
        $this->assertFalse($collection->isEmpty());
        $this->assertEquals($date1, $collection->first());
        $this->assertEquals($date4, $collection->last());
        for ($i=0; $i<3; $i++) {
            $this->assertEquals($dates[$i], $collection->getKey($i));
        }

        //Test Filter - If the numeric day number is even, it belongs in this collection.
        $filteredCollection = $collection->filter(function ($item) {
            return ($item->format('d') % 2 == 0);
        });
        $this->assertEquals($date1, $filteredCollection->first());
        $this->assertEquals($date3, $filteredCollection->last());

        $sortedCollection = $collection->sortCollection(function ($item1, $item2) {
            if ($item1 > $item2) {
                return -1;
            }
            if ($item1 < $item2) {
                return 1;
            }
            return 0;
        });
        $this->assertEquals($date4, $sortedCollection->first());
        $this->assertEquals($date1, $sortedCollection->last());
    }

    public function testCreateFromDatePeriod()
    {
        $start = new Carbon('2021-01-01');
        $end = new Carbon('2021-12-31');
        $lastDate = new Carbon('2021-12-01');
        $interval = DateInterval::createFromDateString('first day of next month');
        $datePeriod = new DatePeriod($start, $interval, $end);
        $collection = TraversableDateCollection::makeFromDatePeriod($datePeriod);
        $this->assertEquals($start, $collection->first());
        $this->assertEquals($lastDate, $collection->last());
        $this->assertEquals(12, $collection->count());
    }
}
