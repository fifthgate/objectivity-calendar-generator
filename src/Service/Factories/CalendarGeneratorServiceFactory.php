<?php

namespace Fifthgate\Objectivity\CalendarGenerator\Service\Factories;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Fifthgate\Objectivity\CalendarGenerator\Service\CalendarGeneratorService;

class CalendarGeneratorServiceFactory
{
    public const CACHEKEY = 'calendar_service_years_cache';

    private $app;

    public function __construct(ApplicationContract $app)
    {
        $this->app = $app;
    }

    public function __invoke(bool $testMode)
    {
        $years = Cache::get(self::CACHEKEY);
        /**
         * Rebuild the index if there isn't a cached version available.
         */
        if (!$years or $testMode) {
            $date = new Carbon();
            Log::info("CalendarYear cache rebuilt at {$date}");

            $years = [];
            $currentYear = $date->format('Y');

            //Generate Calendars for previous and future years.
            for ($year = $currentYear - 3; $year <= $currentYear + 3; $year++) {
                $years[$year] = CalendarGeneratorService::generateCalendarYear($year);
            }
            Cache::set(self::CACHEKEY, $years);
        }

        return new CalendarGeneratorService($years);
    }
}
