<div class="container">
<div class ="row mt-3">
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
           <b>Form Edit Data Siswa</b>
        </div>
        <div class="card-body">
            <!-- $this->form_validation->set_message('rule,'eror message'); -->
            <?php echo validation_errors(); ?>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $siswa['id'];?>"> 
            <div class="form-group">
                <label form="id">  <b>id </b> </label>
                <input type="text" class="form-control" id="id" name="id" value="<?= $siswa['id']; ?> ">
            </div>
            <div class="form-group">
                <label form="nama">  <b>Nama</b> </label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama']; ?> ">
            </div>
            <div class="form-group">
                <label form="nim">  <b>Nim </b> </label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $siswa['nim']; ?> ">
            </div>
            <div class="form-group">
                <label form="alamat">  <b>alamat </b> </label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa['alamat']; ?> ">
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
        </form>
        </div>
        </div>
    </div>
 </div>
</div>