<?= $this->extend('layout/template-bs'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="mt-2 my-3">Tambah Anime</h1>
    <?php if (session()->has('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <?php if (is_array(session('errors'))): ?>
                <ul>
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <?= esc(session('errors')) ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-8">
            <form action="<?= base_url('anime/save') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control <?= (session('errors.judul')) ? 'is-invalid' : '' ?>"
                        value="<?= old('judul') ?>" name="judul" id="judul" placeholder="Masukkan Judul Anime"
                        autofocus />
                    <?php if (session()->has('errors') && session('errors.judul')): ?>
                        <div class="invalid-feedback">
                            <?= session('errors.judul') ?>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" value="<?= old('penulis') ?>" name="penulis" id="penulis"
                        placeholder="Masukkan Penulis Anime" />
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" value="<?= old('penerbit') ?>" name="penerbit" id="penerbit"
                        placeholder="Masukkan Penerbit Anime" />
                </div>
                <div class="mb-3">
                    <!-- <input type="text" class="form-control" value="<= old('sampul') ?>" name="sampul" id="sampul" placeholder="Masukkan sampul Anime" /> -->
                    <div class="mb-3">
                        <label for="sampul" class="form-label form-label-sampul">Sampul</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="/img/pp.jpg" alt="pp.jpg" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <input onchange="previewImg()" type="file"
                                    class="form-control <?= (session('errors.sampul')) ? 'is-invalid' : '' ?>"
                                    name="sampul" id="sampul" placeholder="" aria-describedby="fileHelpId" />

                                <?php if (session()->has('errors') && session('errors.sampul')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.sampul') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                </div>


                <button type="submit" class="btn btn-primary">
                    Tambah
                </button>


            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>