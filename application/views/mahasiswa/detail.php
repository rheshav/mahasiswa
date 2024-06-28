<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Detail Data Mahasiswa</h5>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $mahasiswa['nim']; ?></h6>
                    <h5 class="card-title"><?= $mahasiswa['nama']; ?></h5>
                    <p class="card-text">Jurusan: <?= $mahasiswa['jurusan']; ?></p>
                    <p class="card-text">Angkatan: <?= $mahasiswa['angkatan']; ?></p>
                    <p class="card-text">Semester: <?= $mahasiswa['semester']; ?></p>
                    <p class="card-text">No.HP: <?= $mahasiswa['nohp']; ?></p>
                    <p class="card-text">Alamat: <?= $mahasiswa['alamat']; ?></p>
                    <p class="card-text">Status: <?= $mahasiswa['status']; ?></p>
                    <a href="<?= base_url(); ?>mahasiswa" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>