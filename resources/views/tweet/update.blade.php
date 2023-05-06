<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>tweet app</title>
</head>
<body>
  <h1>edit tweet</h1>
  <div>
    <a href="{{ route('tweet.index') }}">< back</a>
    <p>post form of {{ $tweet->id }}</p>
    @if (session('feedback.success'))
      <p style="color:green">{{ session('feedback.success') }}</p>
    @endif
    <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
      @method('PUT')
      @csrf
      <label for="tweet-content">tweet</label>
      <span>up to 140</span>
      <textarea name="tweet" id="tweet-content" type="text" placeholder="input tweeet">{{ $tweet->content }}</textarea>
      @error('tweet')
        <p style="color:red">{{ $message }}</p>
      @enderror
      <button type="submit">edit</button>
    </form>
  </div>
</body>
</html>