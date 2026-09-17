<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="hero">
    <p class="eyebrow">Point-of-Sale System</p>
    <h1>Welcome to Basic POS</h1>
    <p>This first version provides simple access to customer and staff account information.</p>
    <div class="actions">
        <a class="button" href="/customers">View customers</a>
        <a class="button button-secondary" href="/users">View users</a>
    </div>
</section>
<?= $this->endSection() ?>
