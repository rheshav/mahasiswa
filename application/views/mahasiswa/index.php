<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?php
                        echo base_url();
                        ?>mahasiswa/tambah" class="btn btn-primary"> Tambah Data Mahasiswa</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Daftar Mahasiswa</h2>
            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <li class="list-group-item"><?php echo $mhs['nama']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>