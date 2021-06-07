<?php

namespace Fifthgate\Objectivity\CalendarGenerator;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Fifthgate\Objectivity\CalendarGenerator\Service\CalendarGeneratorService;
use Fifthgate\Objectivity\CalendarGenerator\Service\Factories\CalendarGeneratorServiceFactory;
use Fifthgate\Objectivity\CalendarGenerator\Service\Interfaces\CalendarGeneratorServiceInterface;

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
