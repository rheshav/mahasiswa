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
        <div class="col-md-6">
            <a href="<?= base_url(); ?>mahasiswa/dupe" class="btn btn-primary"> Dupe Data Mahasiswa</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Mahasiswa.." name="keyword">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Daftar Mahasiswa</h2>
            <?php if (empty($mahasiswa)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Mahasiswa tidak ditemukan
                </div>
            <?php endif ?>
            <ul class="list-group">
                
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['no']; ?>" class="badge text-bg-danger float-end" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                        <a href="<?= base_url(); ?>mahasiswa/edit/<?= $mhs['no']; ?>" class="badge text-bg-success float-end">Edit</a>
                        <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['no']; ?>" class="badge text-bg-primary float-end">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>