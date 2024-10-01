<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts with Comments</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .list-group-item {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        h3 {
            color: #666;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Posts and Their Comments</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->body }}</p>
                <h3>Comments:</h3>
                <ul>
                    @foreach ($post->comments as $comment)
                        <li>{{ $comment->body }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

    <h1>Videos and Their Comments</h1>
    <ul>
        @foreach ($videos as $video)
            <li>
                <h2>{{ $video->title }}</h2>
                <p><a href="{{ $video->url }}">{{ $video->url }}</a></p>
                <h3>Comments:</h3>
                <ul>
                    @foreach ($video->comments as $comment)
                        <li>{{ $comment->body }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>

</html>
