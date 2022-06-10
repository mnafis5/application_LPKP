<div class="jumbotron-xxl bg-light shadow-lg p-3 mb-5 bg-body rounded" style="height :490px;">
<div class="row">
  <div class="col">

      <!--  -->
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner text-center">
          <div class="carousel-item active">
            <img src="<?= BASEURL; ?>/img/ss.jpg">
          </div>
          <div class="carousel-item">
            <img src="<?= BASEURL; ?>/img/pic2.jpg" width="600px" height="400px">
          </div>
          <div class="carousel-item">
            <img src="<?= BASEURL; ?>/img/pic3.jpg" width="600px" height="400px">
          </div>
          <div class="carousel-item">
            <img src="<?= BASEURL; ?>/img/pic4.jpg" width="600px" height="400px">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <div class="col">
      <h1 class="mt-5">Selamat datang <?= $_SESSION['nama']; ?> di Dashboard LPK Pembangunan</h1>
      <hr>
      <p>Ini adalah website LPKP untuk guru dan karyawan.Situs ini menyediakan data siswa dan surat.Anda dapat berselancar mencari data siswa dan mengecek jika ada pesan yang masuk atau keluar.</p>
      <button type="button" class="btn btn-primary btn-lg"><a href="<?= BASEURL; ?>/daftar" class="text-decoration-none text-light">Lihat data siswa</a></button>
      <button type="button" class="btn btn-secondary btn-lg"><a href="<?= BASEURL; ?>/surat/masuk" class="text-decoration-none text-light">Lihat surat instansi</a></button>
 
    </div>

</div>
</div>
