<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/fontawesome-free-6.1.1-web/css/all.css">
</head>
<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card shadow">
            <div class="card-body p-4">
                <h5 class="card-title text-center m-2"><strong>Log In</strong></h5>
                <form action="<?= BASEURL; ?>/login/login" method="post">
                <label for="username" class="col-sm-5 col-form-label">Username</label>
                <div class="col-sm">
                <input type="text" class="form-control" id="username" name="username" value="" placeholder="-" required autocomplete="off" >
                </div>
                <label for="code" class="col-sm-5 col-form-label">Kode id</label>
                <div class="col-sm">
                <input type="password" class="form-control" id="code" name="code" value="" placeholder="-" required autocomplete="off" >
                </div>  
                <label for="password" class="col-sm-5 col-form-label">Password</label>
                <div class="col-sm">
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="-" required autocomplete="off" >
                </div> 
                <button type="submit" class="btn btn-primary mt-3 class float-end">Log in</button>
            </div>
        </div>
    </div>
     
</form>
</body>
</html>