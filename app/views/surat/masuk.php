<div class="row">
  <div class="col ms-5 me-5 mb-3 mt-4">
    <?php 
    //Set flash!
    Flasher::flash(); 
    ?>
  </div>
</div>


<div class="container-sm" style="margin-bottom: 200px;">
  <div class="card border-0">
    <div class="card-title ps-3 pe-3"><h3>List Surat Masuk</h3></div>
    <div class="card-title ps-3 pe-3"><p> Surat ini ditujukan kepada <?= $_SESSION['nama']; ?> selaku <?= $_SESSION['role']; ?></h3><p></div>
    <div class=" end-0 pe-3 ps-3">

      <div class="dropdown d-flex justify-content-between">
        <a class="btn btn-light text-center p-2 filter" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="max-width:35px; max-height:35px;"><i class="fa-solid fa-filter" style="color:#000;"></i></a>
        <div class="search col-sm-3">
          <form action="<?= BASEURL; ?>/surat/cari" method="post" class="d-flex flex-row">
              <input type="text" class="me-2 form-control" placeholder="Cari surat" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" id="keyword" autocomplete="off" required autofocus >
              <button class="btn btn-outline-success" type="submit" id="tombolCari">Cari</button>
          </form>
        </div>
        
        <div class="dropdown-menu end-0 ps-3 pe-3 col-sm-4" aria-labelledby="dropdownMenuLink" style="max-width:700px">
        <form action="<?= BASEURL; ?>/surat/filter" method="post">
          <div class="d-flex justify-content-between flex-row flex-warp mb-3">
            <div class="col-sm-5">
              <label for="filtertanggal1" class=" col-form-label">Tanggal Awal</label>
              <div class="">
                <input type="date" class="form-control" id="tanggal" name="filtertanggal1" value="" placeholder="-" required autocomplete="off" >
              </div>
            </div>
            <div class="col-sm-5">
              <label for="filtertanggal2" class=" col-form-label">Tanggal Akhir</label>
              <div class="">
                <input type="date" class="form-control" id="tanggal" name="filtertanggal2" value="" placeholder="-" required autocomplete="off" >
              </div>
            </div>
          </div>
            <button type="submit" class="btn btn-primary mb-2">Filter</button>
          </form>
            </div>
            
        </div>
      </div>
        <div class="card-body card-sm table-responsive">
            <table class="table table-striped table-hover table-resp" style="max-width:100%">
              <thead>
                <tr class="align-middle">
                  <th scope="col">No</th>
                  <th scope="col">Nama Instansi</th>
                  <th scope="col">Nomor Surat</th>
                  <th scope="col">Tanggal Surat</th>
                  <th scope="col">Lampiran</th>
                  <th scope="col">Kepentingan</th>
                  <th scope="col">Isi Surat</th>
                  <th scope="col" id="aksi">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i = 0;
                if(empty($data['surat'])){
                  $err = "<h5 class='align-middle text-center'>Surat Tidak Ditemukan</h5>";
                  $img = BASEURL . '/img/surat.webp';
                  echo"<td colspan='8' class='text-center align-middle text-muted'><img src='$img' style='max-width:180px; opacity:0.5;'>$err</td>";
                }else{
                foreach ($data['surat'] as $su) :
                $tgl = explode('-',$su['tanggal']);
                $mnth = $this->model('Surat_model')->function_translate($tgl); 
                $now = new DateTime();
                // $now->setTimeZone(new DateTimeZone('Asia/Jakarta'));
                $content = new DateTime($su['time']);
                $interval = $content->diff($now);
                $setTime = $this->model('Surat_model')->returnDifferenceTime($interval);
                
                // if ($_GET['url'] == "surat/cari") {
                //   return "<script>
                //   $('.filter').on('click',function() {
                //       $('.modal-body form').attr('action','http://localhost/project_LPK/public/surat/filter');
                //   });
                //   </script>"; 
                  
              // }
                $i++?>
                  <tr>
                    
                    <th scope="row"><p><?= $i ?></p></th>
                    <td><p><?= $su['instansi']; ?></p><p><?= $setTime; ?></p></td>
                    <td><p><?= $su['num']; ?></p></td>
                    <td><p><?= $tgl[2] . '-' . $mnth . '-' . $tgl[0]; ?></p></td>
                    <td><p><?= $su['lampiran']; ?></p></td>
                    <td><p style="max-width:180px;"><?= $su['isi']; ?></p></td>
                    <td><p><a href="<?= BASEURL; ?>/surat/details/<?= $su['id']; ?>">Lihat isi</a></p></td>
                    <td>
                      <div class="d-flex justify-content-between act">
                        <a href="<?= BASEURL; ?>/surat/update/<?= $su['id']; ?>" class=" float-right me-2 tampilModalUbah text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#tambahdata" data-id="<?= $su['id']; ?>">Edit</a>
                        <a href="<?= BASEURL;?>/surat/hapus/<?= $su['id'];?>" onclick="return confirm('apakah yakin ingin dihapus?')" class="text-decoration-none text-danger">Delete</a>
                      </div>
                    </td>
                  </tr>
                <?php
                endforeach;} 
                ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="tombolTambah" data-bs-toggle="modal" data-bs-target="#tambahdata" style="position:absolute; bottom:80px; right:100px; display:fixed; border:none; outline:none;">
      <i class="fa-solid fa-plus shadow-sm" style="position:fixed; width: 60px; z-index:9999; height:60px; border-radius:50px; background-color:#DEDEDE; font-size: 30px; line-height:60px;"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdata" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Surat Masuk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?= BASEURL; ?>/surat/tambahSurat" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">Tanggal & Nomor Surat</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="num" name="num" value="" placeholder="-" required autocomplete="off" autofocus="on">
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">Instansi pengirim</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="instansi" name="instansi" value="" placeholder="-" required autocomplete="off" >
          </div>  
        </div>
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">Tanggal terima</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="" placeholder="-" required autocomplete="off" >
          </div>  
        </div>
        <div class="mb-3 row">
            <label for="Jenis" class="col-sm-2 col-form-label">Lampiran</label>
            <div class="col-sm-10">
              <div class="input-group">
                <select class="form-select" id="lampiran" name="lampiran" placeholder="-" required autocomplete="off" >
                  <option selected>-</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>  
            </div>  
          </div>
        <div class="mb-3 row">
          <label for="ket" class="col-sm-2 col-form-label">Isi disposisi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="isi" name="isi" value="" placeholder="-" required autocomplete="off" >
          </div>  
        </div>
        <div class="mb-3 row imf">
          <label for="time" class="col-sm-2 col-form-label visually-hidden">Waktu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control visually-hidden" id="time" name="time" value="<?= $data['timed']->format('Y-m-d H:i:s'); ?>" placeholder="-">
          </div>  
        </div>
        <div class="mb-3 row im">
          <label for="ket" class="col-sm-2 col-form-label">Surat</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="img" name="img" value="" placeholder="-">
          </div>  
        </div>
        <div class="mb-3 row ig">
          <label for="ket" class="col-sm-2 col-form-label">Surat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="disimg" value="" placeholder="-" disabled>
          </div>  
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary class">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>




