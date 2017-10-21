<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Activity;
// use App\Logg;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        //INI eventos para el registro de login y loginout
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogSuccessfulLogout',
        ],
        //FIN eventos para el registro de login y loginout

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // $request = request();
        // dd($request);

        //INI eventos de eloquent para registrar actividad de los modelos
        Event::listen('eloquent.created: *', function($model){
            $class = class_basename($model);
            if($class=='Activity' || empty(isset(auth()->user()->id)))
                return null;
            $log = Activity::record('created', $class);               
        });
        Event::listen('eloquent.updated: *', function($model){
            $class = class_basename($model);
            if($class=='Activity' || empty(isset(auth()->user()->id)))
                return null;
            $log = Activity::record('updated', $class); 
        });
        Event::listen('eloquent.deleted: *', function($model){
            $class = class_basename($model);
            if($class=='Activity' || empty(isset(auth()->user()->id)))
                return null;
            $log = Activity::record('deleted', $class); 
        });
        Event::listen('eloquent.restored: *', function($model){
            $class = class_basename($model);
            if($class=='Activity' || empty(isset(auth()->user()->id)))
                return null;
            $log = Activity::record('restored', $class); 
        });
        //FIN eventos de eloquent para registrar actividad de los modelos


    }
}
