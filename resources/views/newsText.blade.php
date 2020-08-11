<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGROSTEY</title>
</head>
<body>
    <header>
        <h1>
            АГРОСТЕЙ — АГРегатор новоСТЕЙ
        </h1>
        @include('menu')
    </header>
    <div class="main">
        <h2>
            {{ $newsText['title'] }}
        </h2>
        <p>
            {{ $newsText['text'] }}
        </p>
    </div>
</body>
</html>