<?php

namespace Ktith\Laravelexceptionnotifier\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Ktith\Laravelexceptionnotifier\Events\ExceptionNotifier;
use Ktith\Laravelexceptionnotifier\Listeners\SendApplicationExceptionNotification;

class LaravelExceptionNotifierProvider extends ServiceProvider
{
    private $_packageTag = 'exception-notifier';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(function (ExceptionNotifier $event) {
            $listener = new SendApplicationExceptionNotification();
            $listener->handle($event);
        });

        $this->mergeConfigFrom(__DIR__.'/../config/exceptions.php', $this->_packageTag);
    }
}
