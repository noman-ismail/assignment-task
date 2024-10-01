<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }
        h2 {
            color: #495057;
            margin-bottom: 15px;
        }
        .user-list {
            list-style-type: none;
            padding: 0;
        }
        .user-item {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .post-list {
            list-style-type: none;
            padding-left: 20px;
        }
        .post-item {
            color: #6c757d;
        }
        .user-name {
            font-weight: bold;
            font-size: 1.2em;
        }
        .joined-date {
            font-style: italic;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <h1>Active Users Registered in the Last Month</h1>

    <h2>Users and their Posts</h2>
    <ul class="user-list">
        @foreach ($activeUsers as $user)
            <li class="user-item">
                <span class="user-name">{{ $user->name }}</span>
                <span class="joined-date">(Joined: {{ $user->created_at }})</span>
                <ul class="post-list">
                    @foreach ($user->posts as $post)
                        <li class="post-item">{{ $post->title }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

</body>
</html>
