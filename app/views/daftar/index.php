<div class="row">
      <div class="col ms-5 me-5">
        <?php Flasher::flash(); ?>
      </div>
    </div>

<div class="container">
    <h2 class="ms-3 mt-5">Daftar Siswa LPKP</h2>
    <div class="d-flex flex-row justify-content-between ms-6 bd-highlight align-middle float-end mb-5 mt-5 align-middle" style=" width: 31rem;">
      <div class="search">
        <form action="<?= BASEURL; ?>/daftar/cari" method="post" class="d-flex flex-row">
          <input type="text" class="me-2 form-control p-2" placeholder="Cari siswa" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" id="keyword" autocomplete="off" required autofocus >
          <button class="btn btn-outline-success p-2" type="submit" id="tombolCari">Cari</button>
        </form>
      </div>
      <a href="<?= BASEURL; ?>/daftar/add" class="btn align-middle btn-outline-primary ">Tambah siswa</a>
      <a href="<?= BASEURL; ?>/daftar/importData" class="btn btn-outline-secondary">Import data</a>
    </div>
    <div style="padding: 10px 20px;">
        <div class="container d-flex justify-content-evenly shadow mb-5 bg-body" style="padding: 60px 40px; height:auto; flex-wrap:wrap; border-radius: 10px;">
         
        <?php 
        if (empty($data['mhs'])) {
          echo "<h5 class='align-middle text-center'>Tidak ada data siswa</h5>";
        }else{
          foreach ($data['mhs'] as $mhs) :
            
            $data = $mhs['img'];
            $eimg = explode('.',$data);
            $namimg = $eimg[0];
            $extend = end($eimg);
            if($extend == NULL){
                $namimg = 'no_avatar';
                $extend = 'jpg';
            }
            $image = $namimg .'.'. $extend;
        
        
        
	          ?>
                <div class="card shadow-sm" id="data" style="width: 18rem; padding-top:25px; border-radius:15px; margin:16px 16px; border-color:lightblue;">
                  <a href="<?= BASEURL; ?>/daftar/tambahImg/<?= $mhs['id']; ?>" class="mx-auto picture"data-bs-toggle="tooltip" data-bs-placement="top" title="Upload Picture">
                    <img src="<?= BASEURL;?>/img/siswa/<?= $image; ?>" class="card-img-center" alt="..." width="120rem" height="120rem">
                  </a>
                  <div class="card-body" style="margin-bottom: 25px;">
                    <h4 class="card-title text-center"><?= $mhs["nama"]; ?></h4>
                    <p class="card-text text-center"><?= $mhs["num"];?></p>
                  </div>
                    <div class="card-body d-flex justify-content-evenly p-0 ps-2 pe-2 mb-4" >
                      <a href="<?= BASEURL; ?>/daftar/hapus/<?= $mhs['id']; ?>" onclick="return confirm('apakah yakin ingin dihapus?')" class="card-link btn btn-outline-danger p-2">Hapus</a>
                      <a href="<?= BASEURL; ?>/daftar/detail/<?= $mhs['id']; ?>" class="card-link btn btn-outline-info p-2">Detail</a>
                      <a href="<?= BASEURL; ?>/daftar/addPictures/<?= $mhs['id']; ?>" data-id ="<?= $mhs['id']; ?>" class="card-link btn btn-outline-primary p-2">Upload</a>
                    </div>
                  </div>

            
          <?php endforeach; }?>
        </div>
              <a href="<?= BASEURL; ?>/daftar/indexAll" class="trigger">Tampilkan semua data</a>   ||
              <a href="<?= BASEURL; ?>/daftar/deleteAll"  onclick="return confirm('apakah yakin ingin dihapus?')">Hapus semua data</a>
    </div>
          </div>

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>                                        
