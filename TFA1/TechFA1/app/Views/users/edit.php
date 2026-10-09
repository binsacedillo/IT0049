<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="panel">
    <p class="eyebrow">User Accounts</p>
    <h1>Edit User</h1>

    <?php if (session('errors')): ?>
        <div class="validation-errors">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form class="account-form" action="/users/<?= esc($user['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <label for="username">Username</label>
        <input id="username" name="username" type="text" maxlength="50" value="<?= old('username', $user['username']) ?>" required>

        <label for="full_name">Full name</label>
        <input id="full_name" name="full_name" type="text" maxlength="100" value="<?= old('full_name', $user['full_name']) ?>" required>

        <label for="role">Role</label>
        <input id="role" name="role" type="text" maxlength="50" value="<?= old('role', $user['role']) ?>" required>

        <label for="avatar">Profile picture</label>
        <input id="avatar" name="avatar" type="file" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
        <small>JPG or PNG, maximum 2 MB. The image will be prepared as a 300 × 300 avatar.</small>

        <div class="form-actions">
            <button class="button" type="submit">Update User</button>
            <a href="/users">Cancel</a>
        </div>
    </form>
</section>
<?= $this->endSection() ?>
