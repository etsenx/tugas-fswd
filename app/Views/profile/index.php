<?= $this->extend('layouts/template') ?> <?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Daftar Profil</h1>
            <a href="<?= base_url('/profile/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Profil
            </a>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?> <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">Tabel Data Profil</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table id="profilTable" class="table table-bordered table-hover
                        text-nowrap mb-0 text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="90">Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Prodi</th>
                                    <th>Sosmed</th>
                                    <th width="110">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($profiles)) : ?>
                                    <?php foreach ($profiles as $profile) : ?>
                                        <tr>
                                            <td>
                                                <?php if ($profile['photo']) : ?>
                                                    <img src="<?= base_url('uploads/photos/' . $profile['photo']) ?>" class="img-thumbnail" width="70"> <?php else : ?>
                                                    <span class="text-muted">-</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= esc($profile['name']) ?></td>
                                            <td><?= esc($profile['email']) ?></td>
                                            <td><?= esc($profile['phone']) ?></td>
                                            <td><?= esc($profile['address']) ?></td>
                                            <td><?= esc($profile['study_program']) ?></td>
                                            <td class="text-left">
                                                <small>
                                                    <strong>IG:</strong> <?= esc($profile['instagram']) ?><br>
                                                    <strong>YT:</strong> <?= esc($profile['youtube']) ?><br>
                                                    <strong>TT:</strong> <?= esc($profile['tiktok']) ?>
                                                </small>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/profile/edit/' . $profile['id']) ?>" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i> </a>
                                                <a href="<?= base_url('/profile/delete/' . $profile['id']) ?>" class="btn 
btn-sm btn-danger" title="Hapus"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="8" class="text-muted">Tidak ada data profil.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#profilTable').DataTable({
            pageLength: 5,
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip', // Ini bagian penting!
            buttons: [{
                    extend: 'copy',
                    text: 'Salin'
                },
                {
                    extend: 'excel',
                    text: 'Unduh Excel'
                },
                {
                    extend: 'pdf',
                    text: 'Unduh PDF'
                },
                {
                    extend: 'print',
                    text: 'Cetak'
                }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });
    });
</script>
<?= $this->endSection() ?>