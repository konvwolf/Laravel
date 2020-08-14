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
            Категории
        </h2>
        <ul>
            <?php foreach ($categories as $item): ?>
                <li>
                    <a href="<?= route('CategoryByName', transliterator_transliterate('Russian-Latin/BGN; Lower()', $item['name'])) ?>/">{{ $item['name'] }}</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>