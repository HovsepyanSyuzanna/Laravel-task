<?php

namespace App\Http\Controllers;

use App\Events\SubscribeToWebsiteEvent;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscriber;
use App\Models\Website;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        $subscriber = Subscriber::where([
            'email' => $request->email,
            'website_id' => $request->website_id
        ])->first();

        if ($subscriber) {
            return 'You are already subscribed!';
        }
        /** @var Subscriber $subscriber */
        $subscriber = Subscriber::create([
            'email' => $request->email,
            'website_id' => $request->website_id
        ]);

        /** @var Website $websiteEmail */
        $websiteEmail = Website::where('id', $request->website_id)->first()->email;
        $subscriberEmail = $subscriber->email;

        SubscribeToWebsiteEvent::dispatch($websiteEmail, $subscriberEmail);


    }


}
