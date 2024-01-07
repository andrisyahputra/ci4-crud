<?= $this->extend('layout/template-bs'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Contact me</h1>
    <?php foreach ($alamats as $value) : ?>
        <ul>
            <li><?= $value['tipe'] ?></li>
            <li><?= $value['alamat'] ?></li>
            <li><?= $value['kota'] ?></li>
        </ul>

    <?php endforeach ?>
</div>
<?= $this->endSection(); ?>