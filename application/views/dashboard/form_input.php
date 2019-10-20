<div class="container">

    <center>
        <h3>yuk nulis di web Koding Artikel mas <?= print_r($this->session->userdata('username')); ?></h3>
    </center>
    <div class="row">
        <div class="col-sm-3"> </div>
        <div class="col-sm-6">
            <div class="card-body">
                <form action="<?= base_url('Dashboard/tambah'); ?>" method="post">
                    <input type="text" placeholder="judul" class="form-control" name="judul">
                    <?php echo form_error('judul'); ?>
                    <br>
                    <div class="form-group">

                        <textarea name="isi" placeholder="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <input type="text" placeholder="kategori" class="form-control" name="kategori"> <br>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        <div class="col-sm-3"> </div>
    </div>
</div>