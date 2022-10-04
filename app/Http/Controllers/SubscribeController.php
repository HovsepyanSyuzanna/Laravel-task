<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\Subscriber;


class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        $subscriber = Subscriber::where([
            'email' => $request->email,
            'website_id' => $request->website_id
        ])->first();

        if ($subscriber) {
            return 'You have already subscribed!!!!';
        }
        Subscriber::create([
            'email' => $request->email,
            'website_id' => $request->website_id
        ]);

    }


}
