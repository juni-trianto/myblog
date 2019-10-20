<div class="container">
    <center>
        <h3>Selamat datang di web Koding Artikel mas <?= print_r($this->session->userdata('username')); ?></h3>
    </center>
    <a href="<?= base_url('Dashboard/tambah'); ?>" class="btn btn-primary">Tambah Artikel</a>
    <a href="<?= base_url('Dashboard/logout'); ?>" class="btn btn-danger">log out</a>
    <br><br><br>
    <div class="row">
        <?php foreach ($record as $r) : ?>
            <div class="col-sm-4">
                <div class="card-body">
                    <a href="<?= base_url('Dashboard/page/') . $r['id']; ?>">
                        <h3><?= $r['judul']; ?></h3>
                    </a>
                    <p><?= $r['isi']; ?></p>
                    <div class="small"><?= $r['kategori']; ?></div>
                    <a href="<?= base_url('Dashboard/edit/') . $r['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= base_url('Dashboard/delete/') . $r['id'];; ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>


        <?php endforeach; ?>
    </div>
</div>