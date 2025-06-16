<?= $this->extend('layouts/template') ?> <?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <h1>Tambah Profil</h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Input Profil</h3>
            </div>

            <form action="<?= base_url('/profile/store') ?>" method="post" enctype="multipart/formdata">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label> <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">No HP</label> <input type="text" name="phone" class="form-control" id="phone">
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" class="form-control" id="address" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="study_program">Program Studi</label>
                        <input type="text" name="study_program" class="form-control" id="study_program">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" class="form-control" id="instagram">
                    </div>

                    <div class="form-group">
                        <label for="youtube">Youtube</label> <input type="text" name="youtube" class="form-control" id="youtube">
                    </div>

                    <div class="form-group">
                        <label for="tiktok">TikTok</label> <input type="text" name="tiktok" class="form-control" id="tiktok">
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto</label>
                        <input type="file" name="photo" class="form-control-file" id="photo">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= base_url('/profile') ?>" class="btn btn-secondary"><i class="fas fa-arrowleft"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>