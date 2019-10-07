<div class="container">
<?php if($this->session->flashdata('flash-data')){?>
<div class="row mt-4">
        <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Siswa<strong> Berhasil </strong><?= $this->session->flashdata('flash-data'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
</div>
<?php } ?>
    <div class="row mt-4">
        <div class="col-md-6">
        <a href="<?=base_url();?>siswa/tambah"class="btn btn-primary">Tambah Data</a>
        </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Siswa" name="keyword">
                <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
                </div>
                </div>
                </form>
            </div>
        </div>

    
        <div class="row mt-3">
        <div class="col-md-6">
        <h2>Daftar siswa</h2>

         
        <!-- alert--> 
        <?php if (empty($siswa)):?>
        <div class="alert alert-danger" role="alert">
            Data Siswa tidak ditemukan
        </div>
        <?php endif;?>
        <!-- alert-->


        <ul class = "list-group">
       <?php foreach ($siswa as $sw) :?>
        <li class="list-group-item">
            <?= $sw ['nama'];?>
        <a href="<?= base_url();?>siswa/hapus/<?=$sw['id'];?>"
        class="badge badge-danger float-right"
        onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a>
        <a href="<?= base_url();?>siswa/edit/<?=$sw['id'];?>"
        class="badge badge-success float-right">Edit</a>
        <a href="<?= base_url();?>siswa/detail/<?=$sw['id'];?>"
        class="badge badge-primary float-right">Detail</a>
        </li>
        <?php endforeach; ?>
        </ul>
</div>
</div>
</div>