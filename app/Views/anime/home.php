<?= $this->extend('layout/template-bs'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <a class="btn btn-info my-2" href="<?= base_url('anime/create') ?>" role="button">Tambah Data Anime</a>

    <h1 class="mt-2">Daftar Anime</h1>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>Berhasil </strong><?= session()->getFlashdata('success') ?>
        </div>
    <?php endif ?>


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
                            <a class="btn btn-primary" href="<?= base_url('anime/detail/') . $value['slug'] ?>" role="button">Detail</a>

                        </td>
                    <?php endforeach ?>
                    </tr>
            </tbody>
        </table>
    </div>

</div>
<?= $this->endSection(); ?>