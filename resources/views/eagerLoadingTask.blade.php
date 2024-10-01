<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eager Loading Task</title>
    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Eager Loading Task</h1>

        <h2 class="mb-4">Users and their Posts</h2>
        <ul class="list-group">
            @foreach ($users as $user)
                <li class="list-group-item">
                    <strong>{{ $user->name }}</strong> (ID: {{ $user->id }}) - Posts:
                    {{ $user->posts->count() }}
                    <ul class="list-group mt-2">
                        @foreach ($user->posts as $post)
                            <li class="list-group-item">
                                {{ $post->title }} (Post ID: {{ $post->id }})
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
