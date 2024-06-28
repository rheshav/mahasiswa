<div class="container">
    <?php if ($this->session->flashdata('flash')) :  ?>
        <div class="row mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Mahasiswa <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary"> Tambah Data Mahasiswa</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Daftar Mahasiswa</h2>
            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <li class="list-group-item">
                        <?php echo $mhs['nama']; ?>
                        <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['nim']; ?>" class="badge text-bg-danger float-end" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                        <a href="<?= base_url(); ?>mahasiswa/edit/<?= $mhs['nim']; ?>" class="badge text-bg-success float-end">Edit</a>
                        <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['nim']; ?>" class="badge text-bg-primary float-end">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>