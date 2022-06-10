<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <title>Admin only page</title>
</head>
<body>
    <?php Flasher::Flash(); ?>

    <div class="row">
        <div class="col">
            <h1>Selamat datang <?= $data['judul']; ?></h1>
            <p>Tambah user</p>
            <form action="<?= BASEURL; ?>/login/addUser" method="post">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="co">
                <input type="text" class="form-control" id="username" name="username" value="" placeholder="-" required autocomplete="off" >
                </div>
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="co">
                <input type="text" class="form-control" id="nama" name="nama" value="" placeholder="-" required autocomplete="off" >
                </div>
                <label for="role" class="col-sm-2 col-form-label">jabatan di LPKP:</label>
                <div class="co">
                <input type="text" class="form-control" id="role" name="role" value="" placeholder="-" required autocomplete="off" >
                </div>  
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="co">
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="-" required autocomplete="off" >
                </div>  
                <button type="submit" class="btn btn-primary class">Add User</button>
            </form>
        </div>
    </div>
</body>
</html>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
