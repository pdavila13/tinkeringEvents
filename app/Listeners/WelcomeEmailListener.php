<?php

namespace App\Listeners;

use App\Events\NewRegisteredUserEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewRegisteredUserEvents  $event
     * @return void
     */
    public function handle(NewRegisteredUserEvents $event)
    {
        //
    }
}
