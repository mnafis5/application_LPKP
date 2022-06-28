<div class="container-fluid fixed-left">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="<?= BASEURL; ?>/profile" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Dashboard</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item">
                      <a href="<?= BASEURL; ?>/home" class="nav-link align-middle px-0">
                          <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                      </a>
                  </li>
                  <li class="nav-item his">
                      <a href="<?= BASEURL; ?>/profile/history" class="nav-link align-middle px-0">
                          <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">History</span>
                      </a>
                  </li>
                  <li class="nav-item use">
                      <a href="<?= BASEURL; ?>/profile/users" class="nav-link align-middle px-0">
                          <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Kelola users</span>
                      </a>
                  </li>
                  <li class="akun nav-item">
                    <a class=" akun nav-link align-middle px-0" href="<?= BASEURL; ?>/login/admin">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Tambah akun</span>
                  </a>
                  </li>
                </ul>
                <hr>
                <?php
                $image = $data['profile']; 
                foreach($data['user'] as $su) : ?>
                  
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= BASEURL; ?>/img/profil/<?= $image ?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <?php 
                        $nama1 = $su['username'];
                        $pecah = explode(' ',$nama1);
                        $namaa = $pecah[0];
                        if(!isset($pecah[1])){
                          $nama2 = '';
                        }else{
                          $nama2 = $pecah[1];
                        }
                        $namafinal = $namaa .' '.$nama2;
                        ?>
                        <span class="d-none d-sm-inline mx-1"><?= $namafinal ?></span>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="<?= BASEURL; ?>/login/ubah/<?= $su['id']; ?>">Ubah Password</a></li>                        
                        <li><a class="dropdown-item" href="<?= BASEURL; ?>/profile/setting">Settings</a></li>
                        <li><a class="dropdown-item" href="<?= BASEURL; ?>/profile/profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= BASEURL; ?>/login/loginout">Sign out</a></li>
                      </ul>
                    
                    </div>
                  </div>
                  <?php endforeach; ?>
        </div>
        <div class="col p-0" style="overflow-y:scroll; height:100vh;">
        <nav class="nav p-2 m-0 shadow mb-5 navbar-expand-lg navbar bg-light navbar-light">
          <div class="container-fluid">
            <div class="navbar-brand">
              <a class="navbar-brand active" aria-current="page" href="#">LPKP</a>
            </div>
            <div class="justify-content-start collapse navbar-collapse nav-item" id="navbarSupportedContent">
              <ul class="nav justify-content-end">
                
              </ul>
            </div>
          </div>
        </nav>
