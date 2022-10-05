<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteRequest;
use App\Models\Website;

class WebsiteController extends Controller
{
    public function createWebsite(WebsiteRequest $request)
    {
        $website = Website::where([
            'name' => $request->name,
        ])->first();

        if ($website) {
            return 'The website are created';
        }

        return Website::create([
            'name' => $request->name,
        ]);
    }
}
