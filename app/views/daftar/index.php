<div class="row">
      <div class="col ms-5 me-5">
        <?php Flasher::flash(); ?>
      </div>
    </div>

<div class="container">
    <h2 class="ms-3">Daftar Siswa LPKP</h2>
    <div class="d-flex flex-row justify-content-between ms-6 bd-highlight align-middle float-end mb-5" style=" width: 430px; height:40px; margin-top:30px;">
        <div class="search">
            <form action="<?= BASEURL; ?>/daftar/cari" method="post" class="d-flex flex-row">
                    <input type="text" class="me-2 form-control" placeholder="Cari siswa" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" id="keyword" autocomplete="off" required autofocus >
                    <button class="btn btn-outline-success" type="submit" id="tombolCari">Cari</button>
            </form>
        </div>
        <a href="<?= BASEURL; ?>/daftar/add" class="btn align-middle btn-outline-primary">Tambah siswa</a>
    </div>
    <div style="padding: 10px 20px;">
        <div class="container d-flex justify-content-evenly shadow mb-5 bg-body" style="padding: 60px 40px; height:auto; flex-wrap:wrap; border-radius: 10px;">
          <?php foreach ($data['mhs'] as $mhs) : ?>
                <div class="card shadow-sm" style="width: 18rem; padding-top:25px; border-radius:15px; margin:16px 16px; border-color:lightblue;">
                  <img src="<?= BASEURL;?>/img/<?= $data['img'];?>.jpg" class="card-img-center" alt="..." style="width: 125px; margin:auto;">
                  <div class="card-body" style="margin-bottom: 25px;">
                    <h4 class="card-title text-center"><?= $mhs["nama"]; ?></h4>
                    <p class="card-text text-center"><?= $mhs["num"];?></p>
                  </div>
                    <div class="card-body d-flex justify-content-between" style=" width:250px; height: 40px; margin:auto; margin-bottom:25px; padding:0;">
                      <a href="<?= BASEURL; ?>/daftar/hapus/<?= $mhs['id']; ?>" onclick="return confirm('apakah yakin ingin dihapus?')" class="card-link btn btn-outline-danger">Hapus</a>
                      <a href="<?= BASEURL; ?>/daftar/detail/<?= $mhs['id']; ?>" class="card-link btn btn-outline-info">Detail</a>
                      <a href="<?= BASEURL; ?>/daftar/addPictures/<?= $mhs['id']; ?>" data-id ="<?= $mhs['id']; ?>" class="card-link btn btn-outline-primary">Upload</a>
                    </div>
                  </div>
          <?php endforeach ?>
        </div>
    </div>
          </div>
                    