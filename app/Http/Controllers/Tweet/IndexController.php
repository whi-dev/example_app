<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    public function __invoke(Request $reqest) {
        $tweets = Tweet::all()->sortByDesc('created_at');
        // dd($tweets);
        return view('tweet.index')->with('tweets', $tweets);
    }
}
