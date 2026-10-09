<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="mx-auto max-w-4xl space-y-6">
    <div class="border-l-4 border-feu-gold pl-4">
        <p class="text-sm font-semibold uppercase tracking-wider text-feu-green">Project information</p>
        <h1 class="mt-1 text-3xl font-bold tracking-tight text-black sm:text-4xl">About</h1>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        <article class="rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="text-xl font-bold text-feu-green">Tasks for Today</h2>
            <p class="mt-3 leading-7 text-slate-600">A simple internal task-management dashboard that separates today's priorities from the complete task schedule.</p>
        </article>
        <article class="rounded-xl border border-slate-200 bg-white p-6">
            <h2 class="text-xl font-bold text-feu-green">Developer</h2>
            <p class="mt-3 font-semibold text-slate-900">Vince Gio Acedillo</p>
            <p class="mt-1 text-slate-600">IT0049 — Web System Technologies</p>
            <p class="mt-1 text-slate-600">College of Computer Studies and Multimedia Arts</p>
        </article>
    </div>
</section>
<?= $this->endSection() ?>
