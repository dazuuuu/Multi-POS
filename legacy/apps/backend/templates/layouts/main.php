<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Multi-POS') ?></title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
    <?php
    use App\Public\Components\Shared\Header;
    use App\Public\Components\Shared\Footer;
    echo Header::render($title ?? 'Multi-POS');
    ?>
    <main>
        <?= $content ?? '' ?>
    </main>
    <?= Footer::render() ?>
</body>
</html>
