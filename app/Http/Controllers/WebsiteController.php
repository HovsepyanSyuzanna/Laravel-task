<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteRequest;
use App\Models\Website;


class WebsiteController extends Controller
{
    public function addName(WebsiteRequest $request)
    {
        $website = Website::where([
            'name' => $request->name,
        ])->first();

        if ($website) {
            return 'You have already created a website';
        }

        Website::create([
            'name' => $request->name,
        ]);
    }
}
