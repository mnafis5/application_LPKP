<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <title><?= $data['judul']; ?></title>
</head>
<body>
    <?php Flasher::Flash(); ?>

    <div class="row">
        <div class="col"> 
            <div class="container ">
                <h3>Tambah user</h3>
            <form action="<?= BASEURL; ?>/login/addUser" method="post">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="co">
                <input type="text" class="form-control" id="nama" name="nama" value="" placeholder="-" required autocomplete="off" >
                </div>
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="co">
                <input type="text" class="form-control" id="username" name="username" value="" placeholder="-" required autocomplete="off" >
                </div>
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="co">
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="-" required autocomplete="off" >
                </div>  
                <label for="role" class="col-sm-2 col-form-label">jabatan di LPKP:</label>
                <div class="co">
                <input type="text" class="form-control" id="role" name="role" value="" placeholder="-" required autocomplete="off" >
                </div>  
                <label for="code" class="col-sm-2 col-form-label">Code</label>
                <div class="co">
                <input type="password" class="form-control" id="code" name="code" value="" placeholder="-" required autocomplete="off" >
                </div>  
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="co">
                <input type="email" class="form-control" id="email" name="email" value="" placeholder="-"  autocomplete="off" >
                </div>  
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="co">
                <input type="text" class="form-control" id="address" name="address" value="" placeholder="-"  autocomplete="off" >
                </div>  
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="co">
                <input type="text" class="form-control" id="phone" name="phone" value="" placeholder="-"  autocomplete="off" >
                </div>  
                <label for="about" class="col-sm-2 col-form-label">About</label>
                <div class="co">
                <input type="about" class="form-control" id="about" name="about" value="" placeholder="-"  autocomplete="off" >
                </div>    
                <button type="submit" class="btn btn-primary class">Add User</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
