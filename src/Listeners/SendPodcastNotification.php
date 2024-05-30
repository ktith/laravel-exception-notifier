<?php

namespace Ktith\Laravelexceptionnotifier\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Ktith\Laravelexceptionnotifier\Events\ExceptionNotifier;

class SendPodcastNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ExceptionNotifier $event): void
    {
        //
    }
}
