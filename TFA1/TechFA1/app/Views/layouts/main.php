<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Vince Gio Acedillo TFA1</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav class="nav" aria-label="Main navigation">
            <a class="brand" href="/">Basic POS</a>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/about">About</a>
                <a href="/customers">Customer Accounts</a>
                <a href="/users">User Accounts</a>
            </div>
        </nav>
    </header>

    <main class="container">
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Vince Gio Acedillo &mdash; TFA1 Basic POS</p>
    </footer>
</body>
</html>
