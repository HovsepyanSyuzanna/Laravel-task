<?php

namespace App\Listeners;

use App\Events\SubscribeToWebsiteEvent;
use App\Mail\MailtoWebsiteEmail;
use Illuminate\Support\Facades\Mail;

class EmailToWebsiteListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param SubscribeToWebsiteEvent $event
     * @return void
     */
    public function handle(SubscribeToWebsiteEvent $event)
    {

        Mail::to($event->subscriberEmail)->send(
            new MailtoWebsiteEmail($event->websiteEmail));


    }
}
