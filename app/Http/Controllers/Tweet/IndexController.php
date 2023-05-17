<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    public function __invoke(Request $reqest, TweetService $service) {
        $tweets = $service->getTweets();
        
        // dd($tweets);
        return view('tweet.index')->with('tweets', $tweets);
    }
}
