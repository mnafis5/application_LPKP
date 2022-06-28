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
            <a class="nav-link" href="<?= BASEURL; ?>/daftar/">List Siswa</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Surat
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= BASEURL;?>/surat/masuk/">Masuk</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL;?>/keluar">Keluar</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>/About/">About</a>
          </li>
          <li class="nav-item dropdown me-sm-5">
            <?php $image = $data['profile']; ?>
            <a class="nav-link" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= BASEURL; ?>/img/profil/<?= $image; ?>" width="35" height="35" class="border rounded-circle">
            </a>
            <ul class="dropdown-menu-end dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= BASEURL;?>/profile">Dashboard</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL;?>/login/logout">Log out</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
