<?= $this->extend('layout/template-bs'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Coba Pages</h1>
    <p>
        <?php
        d($angka);
        ?>
    </p>
</div>
<?= $this->endSection(); ?>