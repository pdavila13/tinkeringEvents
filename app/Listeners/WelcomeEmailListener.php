<?php

namespace App\Listeners;

use App\Mail\WelcomeEmail;
use App\Mail\WelcomeEmailMarkdown;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //send email
//        Mail::to('pdavila@iesebre.com')->send(new WelcomeEmail());
        Mail::to($event->user->email)->send(new WelcomeEmailMarkdown($event->user));
    }
}
