<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section>
    <p class="eyebrow">Records</p>
    <h1>Customer Accounts</h1>
    <p class="intro">Customer records retrieved from the MySQL database.</p>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>
