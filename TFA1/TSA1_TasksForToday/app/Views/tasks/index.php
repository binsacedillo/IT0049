<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="space-y-6">
    <div class="border-l-4 border-feu-gold pl-4">
        <p class="text-sm font-semibold uppercase tracking-wider text-feu-green">Complete schedule</p>
        <h1 class="mt-1 text-3xl font-bold tracking-tight text-black sm:text-4xl">Task List</h1>
        <p class="mt-2 text-slate-600">All tasks ordered by their scheduled date.</p>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                <thead class="bg-slate-100 text-xs uppercase tracking-wider text-slate-600">
                    <tr>
                        <th class="px-5 py-3 font-semibold">Task</th>
                        <th class="px-5 py-3 font-semibold">Date</th>
                        <th class="px-5 py-3 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <?php foreach ($tasks as $task): ?>
                        <?php
                        $statusClasses = match ($task['status']) {
                            'completed'   => 'border-emerald-200 bg-emerald-50 text-emerald-800',
                            'in-progress' => 'border-blue-200 bg-blue-50 text-blue-800',
                            default       => 'border-amber-200 bg-amber-50 text-amber-800',
                        };
                        ?>
                        <tr class="hover:bg-slate-50">
                            <td class="whitespace-nowrap px-5 py-4 font-medium text-slate-900"><?= esc($task['title']) ?></td>
                            <td class="whitespace-nowrap px-5 py-4 text-slate-600"><?= esc(date('M j, Y', strtotime($task['task_date']))) ?></td>
                            <td class="whitespace-nowrap px-5 py-4">
                                <span class="inline-flex rounded-full border px-2.5 py-1 text-xs font-semibold capitalize <?= $statusClasses ?>"><?= esc(str_replace('-', ' ', $task['status'])) ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($tasks === []): ?>
                        <tr><td colspan="3" class="px-5 py-8 text-center text-slate-500">No tasks are available.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
