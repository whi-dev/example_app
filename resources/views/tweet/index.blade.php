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
    @foreach ($tweets as $tweet)
      <p>{{ $tweet->content }}</p>
    @endforeach
  </body>
</html>