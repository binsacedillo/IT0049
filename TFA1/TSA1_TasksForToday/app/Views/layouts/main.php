<?php
$currentPath = trim(service('uri')->getPath(), '/');
$navigation = [
    ''        => 'Welcome',
    'tasks'   => 'Task List',
    'profile' => 'Profile',
    'about'   => 'About',
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tasks for Today Management System">
    <title><?= esc($pageTitle ?? 'Tasks for Today') ?> | Tasks for Today</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="flex min-h-screen flex-col bg-slate-50 text-slate-900 antialiased">
    <header class="border-b-4 border-feu-gold bg-feu-green text-white">
        <div class="mx-auto flex max-w-6xl flex-col gap-4 px-4 py-5 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <a href="/" class="max-w-max">
                <span class="block text-xs font-semibold uppercase tracking-[0.2em] text-feu-gold">IT0049</span>
                <span class="text-xl font-bold tracking-tight">Tasks for Today</span>
            </a>
            <nav aria-label="Main navigation">
                <ul class="flex flex-wrap gap-2">
                    <?php foreach ($navigation as $path => $label): ?>
                        <?php $isActive = $currentPath === $path; ?>
                        <li>
                            <a
                                href="/<?= esc($path, 'attr') ?>"
                                class="inline-flex rounded-md border px-3 py-2 text-sm font-semibold transition-colors <?= $isActive ? 'border-feu-gold bg-feu-gold text-black' : 'border-white/30 text-white hover:border-white hover:bg-white/10' ?>"
                                <?= $isActive ? 'aria-current="page"' : '' ?>
                            ><?= esc($label) ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8 sm:px-6 sm:py-10 lg:px-8">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto flex max-w-6xl flex-col gap-1 px-4 py-5 text-sm text-slate-600 sm:px-6 sm:flex-row sm:items-center sm:justify-between lg:px-8">
            <p>&copy; <?= date('Y') ?> Vince Gio Acedillo</p>
            <p>IT0049 — Web System Technologies</p>
        </div>
    </footer>
</body>
</html>
