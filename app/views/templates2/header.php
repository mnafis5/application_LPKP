<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/fontawesome-free-6.1.1-web/css/all.css">

    <script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
    <script src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
    <script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
    <style>

      body{
        overflow-x:hidden;
      }

      ::-webkit-scrollbar {
        width: 10px;
      }
      

      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #cccccc;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #b3b3b3;
      }
    </style>

    <title>Page <?= $data['judul']; ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top pe-5 ps-5">
  <div class="container-fluid">
    <a class="navbar-brand bold fs-4" href="<?= BASEURL; ?>/Home/">LPKP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse float-end flex-row-reverse" id="navbarNavDropdown">
      <div class="nav nav-pills">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>/About/">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>/daftar/">Daftar Siswa</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Surat
            </a>
            <ul class="dropdown-menu" style="right: 80px;" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= BASEURL;?>/surat/masuk/">Masuk</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL;?>/keluar">Keluar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown me-sm-5">
            <a class="nav-link" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user fa-2xl"></i>
            </a>
            <ul class="dropdown-menu-end dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= BASEURL;?>/profile">Dashboard</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL;?>/login/logout">Log out</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL;?>/login/ubah">Ubah Password</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class=" mb-2" style="height:60px;">&nbsp;</div>

    

