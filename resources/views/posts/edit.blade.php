<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
<form action="{{ route('posts.update', $post) }}" method="post">
    @csrf
    @method('PATCH')
    <input type="text" name="title" value="{{ $post->title }}"> <br>
    <textarea name="body">{{ $post->body }}</textarea> <br>
    <button>Edit</button>
</form>
</body>
</html>
