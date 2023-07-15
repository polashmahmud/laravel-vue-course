<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
<h1>Posts ({{ count($posts) }})</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <input type="text" name="title"> <br>
    <textarea name="body"></textarea> <br>
    <button>Add Post</button>
</form>

@foreach($posts as $post)
    <ul>
        <li>
            {{ $post->id }}. {{ $post->title }}
            <div>
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
            <div>
                <a href="{{ route('posts.edit', $post) }}">Edit</a>
            </div>
        </li>
    </ul>
@endforeach

{{ $posts->links() }}


</body>
</html>
