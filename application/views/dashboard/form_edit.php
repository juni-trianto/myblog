<div class="container">

    <center>
        <h3>edit Artikel mas <?= print_r($this->session->userdata('username')); ?></h3>
    </center>
    <div class="row">
        <div class="col-sm-3"> </div>
        <div class="col-sm-6">
            <div class="card-body">
                <form action="<?= base_url('Dashboard/edit'); ?>" method="post">
                    <input type="hidden" name="id" value="<?= $record['id']; ?>" id="">
                    <input type="text" value="<?= $record['judul']; ?>" placeholder="judul" class="form-control" name="judul">
                    <?php echo form_error('judul'); ?>
                    <br>
                    <div class="form-group">

                        <textarea name="isi" placeholder="content" class="form-control" id="exampleFormControlTextarea1" rows="3"> <?= $record['isi']; ?></textarea>
                    </div>

                    <input type="text" value="<?= $record['kategori']; ?>" placeholder="kategori" class="form-control" name="kategori"> <br>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    <a href="<?= base_url('Dashboard'); ?>" class="btn btn-success">
                        <--Back</a> </form> </div> </div> <div class="col-sm-3">
            </div>
        </div>
    </div>