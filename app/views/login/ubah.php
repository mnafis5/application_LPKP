<?php Flasher::flash(); 

    $url = $_GET['url'];
    $ur = explode('/',$url);

 ?>
<div class="container-sm mt-5">
    <div class="card p-5 shadow">
        <div class="card-title h3 mb-2">Ubah Password</div>
        <hr>
        <form action="<?= BASEURL; ?>/login/change" method="post">
        <input type="hidden" name="id" value="<?= $ur[2]; ?>">
            <div class="mb-3 row mt-3">
                <!-- <label for="ket" class="col-sm-2 col-form-label">Instansi pengirim</label> -->
                <label for="oldPass" class="col-sm-2 col-form-label">Password lama:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="oldPass" name="oldPass" value="" placeholder="-" required>
                </div>  
            </div>
            <div class="mb-3 row">
                <label for="newPass" class="col-sm-2 col-form-label">Password baru</label>
                <!-- <label for="ket" class="col-sm-2 col-form-label">Instansi pengirim</label> -->
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="newPass" name="newPass" value="" placeholder="-" required>
                </div>  
            </div>
            <div class="mb-3 row mb-4">
                <label for="verifyPass" class="col-sm-2 col-form-label">Konfirmasi password</label>
                <!-- <label for="ket" class="col-sm-2 col-form-label">Instansi pengirim</label> -->
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="verifyPass" name="verifyPass" value="" placeholder="-" required>
                </div>  
            </div>
            <hr>
            <!-- <button type="submit" class="btn btn-light">Back</button> -->
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</div>
