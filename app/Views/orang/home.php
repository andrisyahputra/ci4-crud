<?= $this->extend('layout/template-bs'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <h1 class="mt-2">Daftar orang</h1>
    <?php if (session()->getFlashdata('success')): ?>
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
                    <th scope="col">blog_title</th>
                    <th scope="col">blog_description</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orangs as $key => $value): ?>

                    <tr>
                        <td><?= ++$key ?></td>
                        <td><?= $value['blog_title'] ?></td>
                        <td><?= $value['blog_description'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-primary" href="<?= base_url('orang/detail/') . $value['slug'] ?>"
                                role="button">Detail</a>

                        </td>
                    <?php endforeach ?>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<?= $this->endSection(); ?>