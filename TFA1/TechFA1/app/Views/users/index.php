<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section>
    <p class="eyebrow">Records</p>
    <h1>User Accounts</h1>
    <p class="intro">Staff records retrieved from the MySQL database.</p>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Full name</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><span class="role"><?= esc($user['role']) ?></span></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>
