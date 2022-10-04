<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Jobs\SendEmailJob;
use App\Models\Post;
use App\Models\Subscriber;

class PostController extends Controller
{

    public function postCreate(PostRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'website_id' => $request->website_id,
        ]);

        $post = Post::where([
            'title' => $request->title,
            'description' => $request->description,
            'website_id' => $request->website_id,
        ])->first();

        if ($post) {
            return 'You have already created a post';
        }


        $subscribers = Subscriber::where('website_id', $request->website_id)->get();

        foreach ($subscribers as $subscriber) {
            SendEmailJob::dispatch($request->title, $request->description,$subscriber->email);
        }



    }
}
