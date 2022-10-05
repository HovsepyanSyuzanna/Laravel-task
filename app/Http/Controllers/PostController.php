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
        $post = Post::where([
            'title' => $request->title,
            'description' => $request->description,
            'website_id' => $request->website_id,
        ])->first();

        if ($post) {
            return 'The post are created Successfully!';
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'website_id' => $request->website_id,
        ]);

        $subscribers = Subscriber::where('website_id', $request->website_id)->get();

        foreach ($subscribers as $subscriber) {
            SendEmailJob::dispatch($request->title, $request->description,$subscriber->email);
        }
     return 0;
    }

}
