<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;

use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweeId = (int)$request->route('tweetId');
        if(!$tweetService->checkOwnTweet($request->user()->id, $tweeId)) {
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $tweeId)->firstOrFail();
        $tweet->delete();
        return redirect()
            ->route('tweet.index')
            ->with('feedback.success', "success to delete");
    }
}
