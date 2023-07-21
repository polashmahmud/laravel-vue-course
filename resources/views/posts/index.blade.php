<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <style>
        .alert {
            position: absolute;
            background: red;
            padding: 10px;
            border-radius: 5px;
            right: 10px;
            top: 10px;
            min-width: 200px;
            color: white;
        }
    </style>
</head>
<body>
<h1>Posts ({{ count($posts) }})</h1>

@if(session()->has('success'))
    <div class="alert">{{ session('success') }}</div>
@endif

@if(session()->has('danger'))
    <div class="alert">{{ session('danger') }}</div>
@endif

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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            let alertElement = document.querySelector(".alert")

            if (alertElement) {
                alertElement.style.display = 'none'
            }
        }, 3000)
    })
</script>


</body>
</html>
