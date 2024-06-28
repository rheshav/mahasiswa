<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">


                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <!-- <?php if (validation_errors()) : ?>
                        <div class="row mb-3">
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        </div>
                    <?php endif; ?> -->
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $mahasiswa['nim'] ?>">
                        <div class="row mb-3">
                            <label for="nim" class="col-sm-3 col-form-label">Nim</label>
                            <div class="col-sm-9">
                                <input type="text" name="nim" class="form-control" id="nim" value="<?= $mahasiswa['nim']; ?>">
                            </div>
                            <div class="form-text text-danger fst-italic"><?= form_error('nim') ?></div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama']; ?>">
                            </div>
                            <div class="form-text text-danger fst-italic"><?= form_error('nama') ?></div>
                        </div>
                        <div class="row mb-3">
                            <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                            <div class="col-sm-9">
                                <select id="inputState" name="jurusan" class="form-select">
                                    <!-- option dibawah diganti menggunakan looping foreach karena untuk combobox gabisa dikasih default value -->

                                    <!-- <option selected>Informatika</option>
                                    <option>Matematika</option>
                                    <option>Kimia</option>
                                    <option>Fisika</option>
                                    <option>Biologi</option> -->

                                    <?php foreach ($jurusan as $jur) : ?>
                                        <?php if ($jur == $mahasiswa['jurusan']) : ?>
                                            <!-- value dimasukkan di option -->
                                            <option value="<?= $jur; ?>" selected><?= $jur; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $jur; ?>"><?= $jur; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-text text-danger fst-italic"><?= form_error('jurusan') ?></div>
                        </div>
                        <div class="row mb-3">
                            <label for="angkatan" class="col-sm-3 col-form-label">Angkatan</label>
                            <div class="col-sm-9">
                                <input type="text" name="angkatan" class="form-control" id="angkatan" value="<?= $mahasiswa['angkatan']; ?>">
                            </div>
                            <div class="form-text text-danger fst-italic"><?= form_error('angkatan') ?></div>
                        </div>
                        <div class="row mb-3">
                            <label for="semester" class="col-sm-3 col-form-label">Semester</label>
                            <div class="col-sm-9">
                                <input type="text" name="semester" class="form-control" id="semester" value="<?= $mahasiswa['semester']; ?>">
                            </div>
                            <div class="form-text text-danger fst-italic"><?= form_error('semester') ?></div>
                        </div>
                        <div class="row mb-3">
                            <label for="nohp" class="col-sm-3 col-form-label">No.HP</label>
                            <div class="col-sm-9">
                                <input type="text" name="nohp" class="form-control" id="nohp" value="<?= $mahasiswa['nohp']; ?>">
                            </div>
                            <div class="form-text text-danger fst-italic"><?= form_error('nohp') ?></div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $mahasiswa['alamat']; ?>">
                            </div>
                            <div class="form-text text-danger fst-italic"><?= form_error('alamat') ?></div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <input type="text" name="status" class="form-control" id="status" value="<?= $mahasiswa['status']; ?>">
                            </div>
                            <div class="form-text text-danger fst-italic"><?= form_error('status') ?></div>
                        </div>
                        <a href="<?= base_url(); ?>mahasiswa" class="btn btn-danger float-start">Kembali</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-end">Simpan Data</button>
                        <!-- <a href="#" type="submit" name="tambah" class="btn btn-primary float-end">Tambah Data</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>