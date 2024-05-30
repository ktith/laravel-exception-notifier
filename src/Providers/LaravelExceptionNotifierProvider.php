<?php

namespace Ktith\Laravelexceptionnotifier\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->mergeConfigFrom(__DIR__.'/../config/exceptions.php', $this->_packageTag);
    }
}
