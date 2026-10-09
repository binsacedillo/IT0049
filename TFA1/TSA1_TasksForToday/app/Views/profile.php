<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="mx-auto max-w-3xl space-y-6">
    <div class="border-l-4 border-feu-gold pl-4">
        <p class="text-sm font-semibold uppercase tracking-wider text-feu-green">Demo account</p>
        <h1 class="mt-1 text-3xl font-bold tracking-tight text-black sm:text-4xl">Profile</h1>
    </div>

    <?php if ($user !== null): ?>
        <article class="overflow-hidden rounded-xl border border-slate-200 bg-white">
            <div class="bg-feu-green px-6 py-5 text-white">
                <p class="text-sm font-semibold text-feu-gold">Team Member</p>
                <h2 class="mt-1 text-2xl font-bold"><?= esc($user['full_name']) ?></h2>
            </div>
            <dl class="grid gap-px bg-slate-200 sm:grid-cols-2">
                <div class="bg-white p-5">
                    <dt class="text-sm font-medium text-slate-500">Username</dt>
                    <dd class="mt-1 font-semibold text-slate-900">@<?= esc($user['username']) ?></dd>
                </div>
                <div class="bg-white p-5">
                    <dt class="text-sm font-medium text-slate-500">Email</dt>
                    <dd class="mt-1 break-all font-semibold text-slate-900"><?= esc($user['email']) ?></dd>
                </div>
                <div class="bg-white p-5 sm:col-span-2">
                    <dt class="text-sm font-medium text-slate-500">Account created</dt>
                    <dd class="mt-1 font-semibold text-slate-900"><?= esc(date('F j, Y', strtotime($user['created_at']))) ?></dd>
                </div>
            </dl>
        </article>
    <?php else: ?>
        <p class="rounded-xl border border-amber-200 bg-amber-50 p-5 text-amber-800">The demo profile is not available.</p>
    <?php endif; ?>
</section>
<?= $this->endSection() ?>
