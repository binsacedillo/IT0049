<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="panel">
    <p class="eyebrow">Customer Accounts</p>
    <h1>New Customer</h1>

    <?php if (session('errors')): ?>
        <div class="validation-errors">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form class="account-form" action="/customers" method="post">
        <?= csrf_field() ?>

        <label for="full_name">Full name</label>
        <input id="full_name" name="full_name" type="text" maxlength="100" value="<?= old('full_name') ?>" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" maxlength="100" value="<?= old('email') ?>" required>

        <label for="phone">Phone</label>
        <input id="phone" name="phone" type="text" maxlength="20" value="<?= old('phone') ?>">

        <div class="form-actions">
            <button class="button" type="submit">Save Customer</button>
            <a href="/customers">Cancel</a>
        </div>
    </form>
</section>
<?= $this->endSection() ?>
