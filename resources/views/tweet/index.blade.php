<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0>
    <meta http-equiv="X-UA-Complete" content="ie=edge">
    <title>tweet</title>
  </head>
  <body>
    <h1>tweet app</h1>
    @auth
    <div>
      <p>tweet form</p>
      @if (session('feedback.success'))
        <p style="color:green">{{ session('feedback.success') }}</p>
      @endif
      <form action="{{ route('tweet.create') }}" method="POST">
        @csrf
        <label for="tweet-content">tweet</label>
        <span>up to 140</span>
        <textarea name="tweet" id="tweet-content" type="text" placeholder="input tweet"></textarea>
        @error('tweet')
          <p style="color:red">{{ $message }}</p>
        @enderror
        <button>tweet</button>
      </form>
    </div>
    @endauth
    @foreach ($tweets as $tweet)
      <details>
        <summary>{{ $tweet->content }} by {{ $tweet->user->name }}</summary>
        @if (\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
        <div>
          <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">edit</a>
          <form action="{{ route('tweet.delete', ['tweetId'=>$tweet->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit">delete</button>      
          </form>
        </div>
        @else
          cannot edit            
        @endif
      </details>
    @endforeach
  </body>
</html>