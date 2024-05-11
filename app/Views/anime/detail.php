<?= $this->extend('layout/template-bs'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="mt-2">Detail Anime</h1>
    <div class="col-md-3">

        <div class="card my-5">
            <img class="card-img-top" src="/img/<?= $anime['sampul'] ?>" alt="<?= $anime['judul'] ?>" />
            <div class="card-body">
                <h4 class="card-title"><?= $anime['judul'] ?></h4>
                <p class="card-text">Penulis : <?= $anime['penulis'] ?></p>
                <p class="card-text">Penerbit : <?= $anime['penerbit'] ?></p>

                <form action="/anime/<?= $anime['id'] ?>" method="post" class="d-inline ">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Di Hapus?')">HAPUS</button>
                </form>
                <!-- <a class="btn btn-danger" href="<= base_url('anime/hapus?id=' . $anime['id']) ?>" role="button">Hapus</a> -->
                <a class="btn btn-warning" href="/anime/edit/<?= $anime['slug'] ?>" role="button">Edit</a>
                <br>
                <a href="<?= base_url('anime') ?>">Kembali Daftar Anime</a>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>