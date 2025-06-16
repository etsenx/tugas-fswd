<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <h1>Edit Profil</h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Profil</h3>
            </div>

            <form action="<?= base_url('/profile/update/' . $profile['id']) ?>" method="post" enctype="multipart/form-data"> <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= esc($profile['name']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= esc($profile['email']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">No HP</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?= esc($profile['phone']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" class="form-control"><?=
                                                                                    esc($profile['address']) ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="study_program">Program Studi</label>
                        <input type="text" name="study_program" id="study_program" class="form-control" value="<?= esc($profile['study_program']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control" value="<?= esc($profile['instagram']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="youtube">Youtube</label>
                        <input type="text" name="youtube" id="youtube" class="form-control" value="<?= esc($profile['youtube']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="tiktok">TikTok</label>
                        <input type="text" name="tiktok" id="tiktok" class="form-control" value="<?= esc($profile['tiktok']) ?>">
                    </div>

                    <div class="form-group">
                        <label>Foto Saat Ini</label><br>
                        <?php if ($profile['photo']) : ?>
                            <img src="<?= base_url('uploads/photos/' . $profile['photo']) ?>" class="imgthumbnail mb-2" width="120">
                        <?php else : ?>
                            <p class="text-muted">Tidak ada foto</p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="photo">Ganti Foto (opsional)</label>
                        <input type="file" name="photo" id="photo" class="form-control-file">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                    <a href="<?= base_url('/profile') ?>" class="btn btn-secondary"><i class="fas fa-arrowleft"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>