<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// añadidas
use Config;
use DB;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //INI agrega en el laravel.log las consultas query realizadas
        // if (Config::get('app.log_queries')) {
        //     DB::listen(function ($event) {
        //         $log = array([
        //             'sql' => $event->sql, 
        //             'bindings' => $event->bindings,
        //             'level' => 'INFO',
        //             'time' => $event->time,
        //         ]);
        //         Log::debug('app.log_queries log', $log);
        //     });
        // }
        //INI agrega en el laravel.log las consultas query realizadas
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
