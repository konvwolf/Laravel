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
        <?php include "menu.php" ?>
    </header>
    <div class="main">
        <h2>
            Новости
        </h2>
        <ul>
            <?php foreach ($news as $item): ?>
                <li>
                    <a href="<?= route('NewsById', str_replace(' ', '_', transliterator_transliterate('Russian-Latin/BGN; Lower()', $item['title']))) ?>/"><?= $item['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>