<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section>
    <p class="eyebrow">Records</p>
    <h1>User Accounts</h1>
    <p class="intro">Staff records retrieved from the MySQL database.</p>

    <?php if (session('success')): ?>
        <p class="notice"><?= esc(session('success')) ?></p>
    <?php endif ?>

    <p><a class="button" href="/users/new">New User</a></p>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <?php
                    $avatarFilename = basename((string) ($user['avatar'] ?? ''));
                    $avatarPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . $avatarFilename;
                    $avatarUrl = $avatarFilename !== '' && is_file($avatarPath)
                        ? '/uploads/avatars/' . rawurlencode($avatarFilename)
                        : '/images/avatar-placeholder.svg';
                    ?>
                    <tr>
                        <td><img class="avatar" src="<?= esc($avatarUrl) ?>" alt="<?= esc($user['full_name']) ?> avatar"></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><span class="role"><?= esc($user['role']) ?></span></td>
                        <td><a href="/users/<?= esc($user['id']) ?>/edit">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>
