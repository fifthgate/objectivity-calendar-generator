<?php

namespace Fifthgate\CalendarService;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Fifthgate\CalendarService\Service\CalendarGeneratorService;
use Fifthgate\CalendarService\Service\Factories\CalendarGeneratorServiceFactory;
use Fifthgate\CalendarService\Service\Interfaces\CalendarGeneratorServiceInterface;

class CalendarGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
             CalendarGeneratorServiceInterface::class,
             function ($app) {
                 $calendarServiceFactory = new CalendarGeneratorServiceFactory($app);
                 return $calendarServiceFactory(env('APP_DEBUG', false));
             }
         );
    }
}
