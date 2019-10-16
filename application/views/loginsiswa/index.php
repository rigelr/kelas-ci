<?= 
form_open('loginsiswa/proses_login');
?>

<div class ="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
<div class="card rouded-0">
    <div class="card-header">
        <h3 class="nb-0">Login</h3>
    </div>

<div class="card-body">
    <form class="form" action="loginsiswa/proses_login" role="foce" autocomplete="off" id="formLogin" novalidate="" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control form-control-lg rounded-g" name="username" id="username" require="">
            <div class="invalid-feedback">Oops, You missed this one</div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control form-control-lg rounded-g" name="password" id="password" require="" autocomplete="new-password">
            <div class="invalid-feedback">Enter your password too!</div>
        </div>

        <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
    </form>
</div>
<div class="alert alert-info" role="alert">
<?php
if (isset($pesan)) {
    echo $pesan;
}
else{
    echo "Masukkan username dan password anda";
}
?>
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= 
form_close();
?>