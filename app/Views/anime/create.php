<?= $this->extend('layout/template-bs'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="mt-2 my-3">Tambah Anime</h1>
    <div class="row">
        <div class="col-md-8">
            <form action="<?= base_url('anime/save') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Anime" autofocus />
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Masukkan Penulis Anime" />
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit Anime" />
                </div>
                <div class="mb-3">
                    <label for="sampul" class="form-label">Sampul</label>
                    <input type="text" class="form-control" name="sampul" id="sampul" placeholder="Masukkan sampul Anime" />
                </div>


                <button type="submit" class="btn btn-primary">
                    Tambah
                </button>


            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>