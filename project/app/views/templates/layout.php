<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
    <h1>Галерея картин</h1>
</header>

<main>
    <?php include($this->templateDir . $template . '.php'); ?>
</main>

<footer>
    <p>&copy; <?= date('Y') ?> Галерея картин</p>
</footer>

<script src="/js/script.js"></script>
</body>
</html>
