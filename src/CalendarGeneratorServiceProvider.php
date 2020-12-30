<?php

namespace Fifthgate\CalendarGenerator;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Fifthgate\CalendarGenerator\Service\CalendarGeneratorService;
use Fifthgate\CalendarGenerator\Service\Factories\CalendarGeneratorServiceFactory;
use Fifthgate\CalendarGenerator\Service\Interfaces\CalendarGeneratorServiceInterface;

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
