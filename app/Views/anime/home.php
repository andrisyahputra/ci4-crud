<?= $this->extend('layout/template-bs'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="mt-2">Daftar Anime</h1>
    <div class="table-responsive">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animes as $key => $value) : ?>

                    <tr>
                        <td><?= ++$key ?></td>
                        <td>
                            <img src="/img/<?= $value['sampul'] ?>" alt="<?= $value['judul'] ?>.jpeg" class="gambar">
                        </td>
                        <td><?= $value['judul'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-primary" href="#" role="button">Detail</a>

                        </td>
                    <?php endforeach ?>
                    </tr>
            </tbody>
        </table>
    </div>

</div>
<?= $this->endSection(); ?>