<!DOCTYPE html>
<html>
<head>
    <title>Daily Digest</title>
</head>
<body>
    <h1>Top Posts of the Day</h1>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
</body>
</html>
